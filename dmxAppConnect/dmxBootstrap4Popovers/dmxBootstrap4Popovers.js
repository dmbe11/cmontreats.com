dmx.Attribute('bs-popover', 'mounted', function(node, attr) {
  this.$addBinding(attr.value, function(value) {
  	if (value) {
      node.setAttribute('data-content', value);
		}
  })
});

$(function () {
  $('body').popover({
    selector: '[popover-title], [data-content]',
    title: function() {
      return this.getAttribute('popover-title') || '';
    },
    content: function() {
      var expression = this.getAttribute('dmx-bs-popover') || '';
      return dmx.parse(expression) || this.getAttribute('data-content') || '';
    }
  });
});
