jQuery(function(e){(new WOW).init(),function(){var e=document.querySelectorAll(".parallax"),t=.5;window.onscroll=function(){[].slice.call(e).forEach(function(e,n){var i=window.pageYOffset,o="0 "+i*t+"px";e.style.backgroundPosition=o})}}()}),$(document).ready(function(){$("[rel^='lightbox']").prettyPhoto({animation_speed:"slow",slideshow:1e4,theme:"dark_square",autoplay_slideshow:!1,hideflash:!0})}),$(function(){var e=function(e,t){this.el=e||{},this.multiple=t||!1;var n=this.el.find(".link");n.on("click",{el:this.el,multiple:this.multiple},this.dropdown)};e.prototype.dropdown=function(e){var t=e.data.el;$this=$(this),$next=$this.next(),$next.slideToggle(),$this.parent().toggleClass("open"),e.data.multiple||t.find(".submenu").not($next).slideUp().parent().removeClass("open")};new e($("#accordion"),!1)});