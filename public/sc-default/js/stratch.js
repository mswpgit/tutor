(function() {
    if(typeof jQuery == 'undefined'){
        return;
    }
    var stratch = {
        minHieght: 260,
        bottomIndent: 50,
        widthTreshold: 992, 
        scrollareas: null,
        getScrollAreas: function() {
            if(this.scrollareas == null) {
                this.scrollareas = $('div.stratch').get();
            }
            return this.scrollareas;
        },
        getY: function(area) {
            var y = 0;
            while(area) {
                y += area.offsetTop;
                area = area.offsetParent;
            }
            return y;
        },
        minimize: function(area) {
            area.style.minHeight = this.minHieght + 'px';
        },
        maximize: function(area) {
            var height;
            if(window.innerHeight) {
                height = window.innerHeight;
            } else if(document.documentElement) {
                height = document.documentElement.clientHeight;
            } else {
                return;
            }
            area.style.minHeight = Math.max(
                height - this.getY(area) - this.bottomIndent,
                this.minHieght
            ) + 'px';
        },
        process: function() {
            var width, areas = this.getScrollAreas();
            if(window.innerWidth) {
                width = window.innerWidth;
            } else if(document.documentElement) {
                width = document.documentElement.clientWidth;
            } else {
                return;
            }
            for(var i in areas) {
                if(width < this.widthTreshold) {
                    this.minimize(areas[i]);
                } else {
                    this.maximize(areas[i]);
                }
            }
        },
    };
    $(function(){
        window.onresize = function() {
            stratch.process();
        };
        $('div.alert').bind('closed.bs.alert', function () {
        	window.setTimeout(function(){
        		stratch.process();
        	}, 100);
    	});
        stratch.process();
    });
})();