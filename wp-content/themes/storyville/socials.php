<ul class="socials">
  <li class="sharetext">Share</li>
</ul>


<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script>
 <script type="text/javascript">
 <?php echo 'var title = "';
the_title();
 echo '";'; ?>

var socials = {
  dom: {},
  create: function () {
    this.dom.parent = $('ul.socials');
    this.dom.items = {};

    var socials = ['twitter', 'facebook', 'pinterest', 'email'];

    var link = window.location.href;
    var title = $('.title').text();
    var li;
    for (var i = 0; i < socials.length; i++) {
      li = $('<li></li>')
      this.dom.items[socials[i]] = $('<a></a>')
        .addClass('socials-link '+socials[i])
        .attr('data-action', socials[i])
        .attr('target', '_blank');

      switch (socials[i]) {
        case 'facebook':
          this.dom.items[socials[i]].attr('href','https://www.facebook.com/dialog/feed?app_id=121985107999367&link='+link+'&redirect_uri=http://storyville.com');
          break;
        case 'twitter':
          this.dom.items[socials[i]].attr('href','https://twitter.com/intent/tweet?hashtags=Storyville&original_referer='+'http://storyville.com'+'&related=storyville&tw_p=tweetbutton&url='+encodeURIComponent(link));
          break;
        case 'pinterest':
          this.dom.items[socials[i]].attr('href','http://pinterest.com/pin/create/button/?url'+link+'&amp;media='+postthumbsrc+'&amp;description='+title);
          break;
        case 'email':
          this.dom.items[socials[i]].attr({'href': 'mailto:?subject='+title+'&body='+link});
          break;
      }

      li.append(this.dom.items[socials[i]]);
      this.dom.parent.append(li);      
    };

    // li = $('<li></li>');
    // this.dom.items.email = $('<a></a>')
    //   .addClass('socials-link email')
    //   .attr({'href': 'mailto:?subject='+title, 'target': '_blank'});
    // li.append(this.dom.items.email);

    //this.dom.modal.wrap.on('click', this.handleClose);
    //this.dom.parent.on('click', $.proxy(this.handleClick, this));
  },
  init: function() {
    this.create();

    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
  }


}

  $('document').ready(socials.init());
</script>