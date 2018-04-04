<?php
/**
 * Displays only one prefered action in table list.
 *
 * Get rid of schizophrenic decisions between selecting data and showing table structure.
 * Optimize your workflow!
 *
 * @author Peter Knut
 * @copyright 2014-2015 Pematon, s.r.o. (http://www.pematon.com/)
 */
class AdminerQuickFilterTables
{
    public function AdminerQuickFilterTables()
    {
    }
    public function head()
    {
?>

        <style>
        .quick-filter{
            position: relative;
        }
            #quick{
                display:block;
                width: 96%;
                margin: 0 2%;
                padding:5px 6px;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                outline: none;
            }
            .clear{
                display: none;
                position: absolute;
                right: 3%;
                top: 0;
                text-align: center;
                padding: 8px 9px;
                font-size: 9px;
                cursor: pointer;
            }
        </style>
        <script type="text/javascript" src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script type="text/javascript" nonce="<?php get_nonce()?>">
            jQuery(document).ready(function($){
                $('#tables').prepend('<div class="quick-filter"><input id="quick" placeholder="Filter tables"><div class="clear quick-clear">X</div></div>');
                $('.quick-clear').on('click',function(){
                    $('#quick').val('').trigger('keypress');
                });
                $('#quick').on('keyup keypress',function(e){
                    if(e.key === 'Escape') {
                        $(this).val('');
                    }
                    var filter = $(this).val();
                    localStorage.setItem('filter', filter);
                    if(filter.length){
                        $('.quick-clear').show();
                        //hide all show only match
                        $('#tables a').parent().hide();
                        // check for table name
                        var pattern = new RegExp('table=.*('+filter+')','g');
                        $('#tables a[href*="table="]').each(function(){
                            var href = $(this).attr('href');
                            if(pattern.test(href)){
                                $(this).parent().show();
                            }
                        });
                        // if Enter is pressed go to table
                        if(e.key === 'Enter') {
                            window.location = $('#tables a:visible').first().attr('href');
                        }
                    }else{
                        $('.quick-clear').hide();
                        $('#tables a').parent().show();
                    }
                }).val(localStorage.getItem('filter')).trigger('keypress');
            });

        </script>

<?php
    }

}
