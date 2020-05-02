/*!
 DMXzone Background Video
 Version: 1.0.1
 (c) 2019 DMXzone.com
 @build 2019-06-13 16:31:31
 */
dmx.Component("background-video",{tag:"div",initialData:{paused:!1},attributes:{src:{type:String,default:null}},methods:{play:function(){this.video.play()},pause:function(){this.video.pause()},toggle:function(){this.video.paused?this.video.play():this.video.pause()}},render:function(t){this.$parse();var e=document.createElement("div"),s=document.createElement("video");s.src=this.props.src,s.playsinline=!0,s.autoplay=!0,s.muted=!0,s.loop=!0,s.setAttribute("muted",""),s.setAttribute("playsinline",""),s.addEventListener("play",this.updateData.bind(this)),s.addEventListener("pause",this.updateData.bind(this)),e.style.setProperty("position","absolute"),e.style.setProperty("width","100%"),e.style.setProperty("height","100%"),e.style.setProperty("overflow","hidden"),s.style.setProperty("position","absolute"),s.style.setProperty("width","auto"),s.style.setProperty("height","auto"),s.style.setProperty("min-width","100%"),s.style.setProperty("min-height","100%"),s.style.setProperty("top","50%"),s.style.setProperty("left","50%"),s.style.setProperty("transform","translate(-50%, -50%)");var i=document.createElement("div");i.style.setProperty("position","relative"),t.style.setProperty("position","relative"),t.parentNode.insertBefore(i,t),e.appendChild(s),i.appendChild(e),i.appendChild(t),this.video=s},updateData:function(){this.set("paused",this.video.paused)}});
//# sourceMappingURL=../maps/dmxBackgroundVideo.js.map
