<h2>Shop By</h2>
<div class="panel-group category-products" id="accordian">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Theme
                </a>
            </h4>
        </div>
        <div id="sportswear" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <?php getThemes(); ?>

                </ul>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Room
                </a>
            </h4>
        </div>
        <div id="mens" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <?php getCategories(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>