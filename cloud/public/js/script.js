var dom = {
	input: document.getElementsByTagName("input"),
	cross: document.getElementById("logo_cross"),
	nav: document.getElementById("nav"),
	open: document.getElementById("open"),
	content: document.getElementById("content"),
	init: function() {
		this.input_style();
		this.nav_toggle();
	},
	input_style: function() {
		self = this;
		for (var i = 0; i < this.input.length; i++) {

			this.input[i].onfocus = function() {
				self.focus = this;

				var label = this.previousElementSibling;
				if(label) {
					label.style.transition = 'transform 1.0s ease-in-out 0s';
					label.style.transform = 'scale(0.5) translate(-70px, -40px)';
				}
			}
			this.input[i].onblur = function() {
				if(this.value == "") {
					var label = this.previousElementSibling;
					if(label) {
						label.style.transition = 'transform 1.0s ease-in-out 0s';
						label.style.transform = 'scale(1) translate(0px, 4px)';
					}
				}

			}

		}

	},
	nav_toggle: function() {
		console.log(this.nav);
		self = this;
		self.cross.addEventListener('click', function() {

			self.nav.style.display = 'none';
			self.open.style.display = 'flex';
			self.content.style.minWidth = '100%';
		});
		self.open.addEventListener('click', function() {
			self.nav.style.display = 'flex';
			self.open.style.display = 'none';
			self.content.style.minWidth = '80%';
		});
	}
}
dom.init();
