// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }

  if(!Modernizr.input.placeholder) {
    $('input').each(function() {
      if($(this).val() === '' && $(this).attr('placeholder') !== '') {
        $(this).val($(this).attr('placeholder'));
        $(this).focus(function() {
          if($(this).val() === $(this).attr('placeholder')) {
            $(this).val('');
          }
        });
        $(this).blur(function() {
          if($(this).val() === '') {
            $(this).val($(this).attr('placeholder'));
          }
        });
      }
    });
  }
}());

// Place any jQuery/helper plugins in here.

//     Twitter Bootstrap jQuery Plugins - Modal Responsive Fix
//     Copyright (c) 2012 Nick Baugh <niftylettuce@gmail.com>
//     MIT Licensed
//     v0.0.4
// * Author: [@niftylettuce](https://twitter.com/#!/niftylettuce)
// * Source: <https://github.com/niftylettuce/twitter-bootstrap-jquery-plugins>
// # modal-responsive-fix
(function(e,t){e.fn.modalResponsiveFix=function(n){function i(){var r=e(this),i=r.hasClass("modal-gallery"),o=r.hasClass("modal-fullscreen"),u=r.hasClass("modal-fullscreen-stretch");r.on(n.event,function(n){setTimeout(s(r,i,o,u),1),e(t).on("resize.mrf",s(r,i,o,u)),i&&r.on("displayed",s(r,i,o,u))}),r.on("hide",function(){e(t).off("resize.mrf",i,o,u)})}function s(r,i,s,o){return function(u){var a=r||e(this),f=a.find(".modal-header"),l=a.find(".modal-body"),c=a.find(".modal-footer"),h=e(t),p={width:h.width(),height:h.height()};if(i&&a.data().modal._loadImageOptions&&typeof u=="object"&&u.type==="resize"){var d=a.data().modal._loadImageOptions;s?(d.maxWidth=p.width,d.maxHeight=p.height,o&&(d.minWidth=p.width,d.minHeight=p.height)):(d.maxWidth=p.width-a.data().modal._loadOptions.offsetWidth,d.maxHeight=p.height-a.data().modal._loadOptions.offsetHeight),p.width>480&&a.css({marginTop:-(a.outerHeight()/2),marginLeft:-(a.outerWidth()/2)});var v={width:a.data().modal.img.width,height:a.data().modal.img.height},m=a.data().modal._loadingImage=t.loadImage.scale(v,d);a.find(".modal-image").css(m),a.find(".modal-image img").attr("width",m.width),a.find(".modal-image img").attr("height",m.height)}p.scrollTop=h.scrollTop(),p.maxHeight=p.height-n.spacing*2,p.width>480&&p.width<=767&&(p.maxHeight=p.maxHeight-20);var g={width:a.width(),height:a.height()};if(!i){var y=p.maxHeight;y-=f.outerHeight(!0),y-=c.outerHeight(!0),y-=l.outerHeight(!0)-l.height(),y>400&&(y=400),l.css("max-height",y)}g.height>=p.maxHeight?g.top=i&&s?p.scrollTop:p.scrollTop+n.spacing:g.top=p.scrollTop+(p.height-g.height)/2,a.css({top:g.top,position:"absolute",marginTop:0});if(n.debug){var b={options:n,data:p,modal:g};console.log("modalResponsiveFix",b)}}}n=n||{},n.spacing=n.spacing||10,n.debug=n.debug||!1,n.event=n.event||"show";var r=e(this);r.each(i)}})(jQuery,window);

$.fn.eqHeights=function(a){var f={child:false},a=$.extend(f,a),d=$(this),c,g=0,b=0,e=[];if(d.length>0&&!d.data("eqHeights")){$(window).bind("resize.eqHeights",function(){d.eqHeights()});d.data("eqHeights",true)}if(a.child&&a.child.length>0){c=$(a.child,this)}else{c=$(this).children()}c.height("auto").each(function(){var h=this.offsetTop;if(g>0&&g!=h){$(e).height(b);b=$(this).height();e=[]}b=Math.max(b,$(this).height());g=this.offsetTop;e.push(this)});$(e).height(b)};