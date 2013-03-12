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
}());

// Place any jQuery/helper plugins in here.

/**
 * Copyright (c) 2007-2012 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 1.4.3
 */
 ;(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(!e)return;var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
             
             
//     Twitter Bootstrap jQuery Plugins - Modal Responsive Fix
//     Copyright (c) 2012 Nick Baugh <niftylettuce@gmail.com>
//     MIT Licensed
//     v0.0.4
// * Author: [@niftylettuce](https://twitter.com/#!/niftylettuce)
// * Source: <https://github.com/niftylettuce/twitter-bootstrap-jquery-plugins>
// # modal-responsive-fix
(function(e,t){e.fn.modalResponsiveFix=function(n){function i(){var r=e(this),i=r.hasClass("modal-gallery"),o=r.hasClass("modal-fullscreen"),u=r.hasClass("modal-fullscreen-stretch");r.on(n.event,function(n){setTimeout(s(r,i,o,u),1),e(t).on("resize.mrf",s(r,i,o,u)),i&&r.on("displayed",s(r,i,o,u))}),r.on("hide",function(){e(t).off("resize.mrf",i,o,u)})}function s(r,i,s,o){return function(u){var a=r||e(this),f=a.find(".modal-header"),l=a.find(".modal-body"),c=a.find(".modal-footer"),h=e(t),p={width:h.width(),height:h.height()};if(i&&a.data().modal._loadImageOptions&&typeof u=="object"&&u.type==="resize"){var d=a.data().modal._loadImageOptions;s?(d.maxWidth=p.width,d.maxHeight=p.height,o&&(d.minWidth=p.width,d.minHeight=p.height)):(d.maxWidth=p.width-a.data().modal._loadOptions.offsetWidth,d.maxHeight=p.height-a.data().modal._loadOptions.offsetHeight),p.width>480&&a.css({marginTop:-(a.outerHeight()/2),marginLeft:-(a.outerWidth()/2)});var v={width:a.data().modal.img.width,height:a.data().modal.img.height},m=a.data().modal._loadingImage=t.loadImage.scale(v,d);a.find(".modal-image").css(m),a.find(".modal-image img").attr("width",m.width),a.find(".modal-image img").attr("height",m.height)}p.scrollTop=h.scrollTop(),p.maxHeight=p.height-n.spacing*2,p.width>480&&p.width<=767&&(p.maxHeight=p.maxHeight-20);var g={width:a.width(),height:a.height()};if(!i){var y=p.maxHeight;y-=f.outerHeight(!0),y-=c.outerHeight(!0),y-=l.outerHeight(!0)-l.height(),y>400&&(y=400),l.css("max-height",y)}g.height>=p.maxHeight?g.top=i&&s?p.scrollTop:p.scrollTop+n.spacing:g.top=p.scrollTop+(p.height-g.height)/2,a.css({top:g.top,position:"absolute",marginTop:0});if(n.debug){var b={options:n,data:p,modal:g};console.log("modalResponsiveFix",b)}}}n=n||{},n.spacing=n.spacing||10,n.debug=n.debug||!1,n.event=n.event||"show";var r=e(this);r.each(i)}})(jQuery,window);

/*	Add scroll support to divs
	Based off of Chris Barr's solution
	http://chris-barr.com/files/touchScroll.htm	*/
(function(a){a.fn.extend({touchScroll:function(){if((navigator.userAgent.match(/android 3/i))||(navigator.userAgent.match(/honeycomb/i))){return this}try{document.createEvent("TouchEvent")}catch(b){return this}return this.each(function(){var c=this,d=0,e=0;c.addEventListener("touchstart",function(f){d=this.scrollTop+f.touches[0].pageY;e=this.scrollLeft+f.touches[0].pageX},false);c.addEventListener("touchmove",function(f){if((this.scrollTop<this.scrollHeight-this.offsetHeight&&this.scrollTop+f.touches[0].pageY<d-5)||(this.scrollTop!==0&&this.scrollTop+f.touches[0].pageY>d+5)){f.preventDefault()}if((this.scrollLeft<this.scrollWidth-this.offsetWidth&&this.scrollLeft+f.touches[0].pageX<e-5)||(this.scrollLeft!==0&&this.scrollLeft+f.touches[0].pageX>e+5)){f.preventDefault()}this.scrollTop=d-f.touches[0].pageY;this.scrollLeft=e-f.touches[0].pageX},false)})}})})(jQuery);

$.fn.eqHeights=function(a){var f={child:false},a=$.extend(f,a),d=$(this),c,g=0,b=0,e=[];if(d.length>0&&!d.data("eqHeights")){$(window).bind("resize.eqHeights",function(){d.eqHeights()});d.data("eqHeights",true)}if(a.child&&a.child.length>0){c=$(a.child,this)}else{c=$(this).children()}c.height("auto").each(function(){var h=this.offsetTop;if(g>0&&g!=h){$(e).height(b);b=$(this).height();e=[]}b=Math.max(b,$(this).height());g=this.offsetTop;e.push(this)});$(e).height(b)};