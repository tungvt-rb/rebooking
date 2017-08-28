 (function($){
    $(function(){
        $('.btnupslide').live('click',function(){
            var $t = $(this),
                $tr = $t.parents('tr'),
                index = $('#themecode_slides tr').index($tr);
            if (index==0) {
                return false;
            } else {
                var $target = $('#themecode_slides tr:eq('+(index-1)+')');
                $tr.insertBefore($target);
            }
        });
        $('.btndownslide').live('click',function(){
            var $t = $(this),
                $tr = $t.parents('tr'),
                index = $('#themecode_slides tr').index($tr),
                total = $('#themecode_slides tr').length - 1;
            if (index==total) {
                return false;
            } else {
                var $target = $('#themecode_slides tr:eq('+(index+1)+')');
                $tr.insertAfter($target);
            }
        });
        $('.btnremoveslide').live('click',function(){
            if (confirm('Are you sure you want to remove this slide?')) {
                var $t = $(this),
                    $tr = $t.parents('tr');
                $tr.remove();
            }
        });
        
        var wpMediaFramePost = wp.media.view.MediaFrame.Post;
        wp.media.view.MediaFrame.Post = wpMediaFramePost.extend({
            mainInsertToolbar: function(view){
                'use strict';
                wpMediaFramePost.prototype.mainInsertToolbar.call(this, view);
        
                var controller = this;
        
                this.selectionStatusToolbar( view );
        
                view.set('insertToSlider', {
                    style: 'primary',
                    priority: 1,
                    text: 'Add to Slider',
                    requires: {
                        selection: true
                    },
                    click: function() {
                        var html = '<tr>'
                                    + '<td valign="top">'
                                        + '<img src="<%= thumbImagePath %>" width="100" />'
                                        + '<input type="hidden" name="slider[thumbnail][]" value="<%= thumbImagePath %>" />'
                                        + '<input type="hidden" name="slider[vr_640x362][]" value="<%= thumbImage640x362Path %>" />'
                                        + '<input type="hidden" name="slider[image][]" value="<%= fullImagePath %>" />'
                                    + '</td>'
                                    + '<td valign="top">'
                                        + '<input type="text" class="widefat" name="slider[heading][]" value="Heading" onfocus="if(this.value==\'Heading\')this.value=\'\'" onblur="if(this.value==\'\')this.value=\'Heading\'" />'
                                        + '<textarea class="widefat" name="slider[description][]" onfocus="if(this.value==\'Description\')this.value=\'\'" onblur="if(this.value==\'\')this.value=\'Description\'">Description</textarea>'
                                        + '<input type="text" class="widefat" name="slider[link][]" value="URL" onfocus="if(this.value==\'URL\')this.value=\'\'" onblur="if(this.value==\'\')this.value=\'URL\'" />'
                                    + '</td>'
                                    + '<td valign="top">'
                                        + '<input type="button" class="button btnupslide" value="&uarr;" /><br />'
                                        + '<input type="button" class="button btndownslide" value="&darr;" /><br />'
                                        + '<input type="button" class="button btnremoveslide" value="X" />'
                                    + '</td>'
                                + '</tr>';
                        var state = controller.state(),
                            selection = state.get('selection')._byId,
                            template = _.template(html),
                            output = '',
                            thumbsize = '';

                        _.each(selection, function( item ) {
                            if(item.attributes.type === 'image') {
                                if (!item.attributes.sizes.vr_640x362) {
                                    thumbsize = item.attributes.sizes.full.url;
                                } else {
                                    thumbsize = item.attributes.sizes.vr_640x362.url;
                                }
                                output = template({
                                    fullImagePath: item.attributes.sizes.full.url,
                                    thumbImagePath: item.attributes.sizes.thumbnail.url,
                                    thumbImage640x362Path: thumbsize
                                });
                            }
                        });
                        
                        $('#themecode_slides').append(output);
        
                    	try{tb_remove();}catch(e){};
                    }
                });
            }
        });
    });
})(jQuery);