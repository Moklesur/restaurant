<?php

/********************************************************
 * Modal
 ********************************************************/

/**
 * Search
 */
?>
<div class="modal fade" id="search-pop" tabindex="-1" role="dialog" aria-labelledby="search-popLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="search-popLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <form role="search" method="get" class="" action="<?php echo home_url( '/' ); ?>">
                    <div class="form-group">
                        <input type="search" class="search-field form-control"
                               placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
                               value="<?php echo get_search_query() ?>" name="s" />
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>