//$(document).on('ready', function() {
  var selected = []
  ,  container = $('#articles-container ')
  ,  cat = '';


  $('.tags').on('click', handleClick);
  setExisting();



  function setExisting() {
    if (typeof params == 'undefined')
      return;
    if (params.category)
      cat = params.category.replace(/\s/g, '');
    if (params.tag) {
      tag = params.tag.replace(/[^a-z,A-Z,0-9,_,.]/g, '');
      tag = tag.toLowerCase();
      selected.push(tag);
      $('.'+tag).addClass('active').attr('data-filter-active', true);
    }
    container.children('article').css("opacity", 0);
    container.empty().addClass('loading');
    getSelectedPosts();
  };

  function handleClick(e) {
    e.preventDefault();

    if (e.target.getAttribute('data-filter-active') == "true") {
      e.target.setAttribute('data-filter-active', false);
      $(e.target).removeClass('active');
      selected.splice(selected.indexOf(e.target.getAttribute('title')), 1);      
    } else {
      e.target.setAttribute('data-filter-active', true);
      $(e.target).addClass('active');
      selected.push(e.target.getAttribute('title'));
    }
    container.children('article').css("opacity", 0);

    setTimeout(function() { 
      container.empty().addClass('loading');
    }, 300);
    setTimeout(getSelectedPosts, 600)
    
  };

  function getSelectedPosts() {
    var tags = selected.join(',');

    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      data: { 
        tag: tags,
        category: cat,
        action: 'show_post'
      },      
      success: function(res) { 
        var returned = $(res);
        returned.css("opacity", 0);
        container.append(returned);
        container.removeClass('loading');

        returned.each(function(index) {
          var self = $(this);
          setTimeout(function(index) {
            self.css('opacity',1);
          }, 200*(index+1))
        })      
      }
    })
  }
//});