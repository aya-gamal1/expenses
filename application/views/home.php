
        <!-- page content -->
        <div class="right_col" role="main">

            <h3>Income</h3>
<div class="row">

    <?php foreach($incomes as $income){ ?>
    <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="panel panel-success">
                <div class="panel-heading">Income</div>
                <div class="panel-body"><?php echo $income->Description;?><br>
                    .
                </div>
                <div class="panel-footer clearfix">
                    <div class="pull-right">
                       <?php echo $income->Name ?>
                    </div>
                    <div class="pull-left">
                        <?php echo $income->Date ?>
                    </div>
                </div>
            </div>
    </div>
    <?php  }?>
    </div>
            <h3>Outcome</h3>
            <div class="row">
    <?php foreach($outcomes as $outcome){ ?>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="panel panel-danger">
                <div class="panel-heading">Outcome</div>
                <div class="panel-body"><?php echo $outcome->Description;?><br>
                    .
                </div>
                <div class="panel-footer clearfix">
                    <div class="pull-right">
                        <?php echo $outcome->Name ?>
                    </div>
                    <div class="pull-left">
                        <?php echo $outcome->Date ?>
                    </div>
                </div>
            </div>
        </div>
    <?php  }?>




</div>


                    </div>