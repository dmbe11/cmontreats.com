/*!
 DMXzone Scheduler
 Version: 1.0.0
 (c) 2017 DMXzone.com
 @build 2017-05-09 11:33:54
 */
dmx.Component("scheduler",{initialData:{running:!1,percent:0},attributes:{delay:{type:Number,default:60},unit:{type:String,default:"seconds"},norepeat:{type:Boolean,default:!1},noload:{type:Boolean,default:!1}},methods:{start:function(){this.start()},stop:function(){this.stop()}},events:{tick:Event},render:function(t){this.props.noload||this.start()},start:function(){this.set("running",!0),this._startTime=(new Date).getTime(),this.tick()},stop:function(){this.set("running",!1),this.set("percent",0)},tick:function(){if(this.data.running){var t=new Date-this._startTime,e=this.delay();return this.set("percent",Math.ceil(100*t/e)),t>=e?(this.set("percent",100),this.dispatchEvent("tick"),void(this.props.norepeat?this.stop():this.start())):void requestAnimationFrame(this.tick.bind(this))}},delay:function(){switch(this.props.unit){case"miliseconds":return this.props.delay;case"minutes":return 6e4*this.props.delay;case"hours":return 36e5*this.props.delay;case"days":return 864e5*this.props.delay;default:return 1e3*this.props.delay}}});
//# sourceMappingURL=../maps/dmxScheduler.js.map
