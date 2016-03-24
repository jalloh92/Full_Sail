<div class="partTypes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Part Tree'); ?></h1>
			</div>
		</div>
	</div><!-- closes row -->


	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Html->link('Parts List', '/parts/index');?></li>
							<li><?php echo $this->Html->link('Add Part', '/parts/add');?></li>
						</ul>	
					</div>
				</div>
			</div>
		</div><!-- closes col md 3 -->

		<div class="col-md-9">

			<!-- PART TREE -->
			<!-- REMOVE HARD CODING IF TIME -->
			<!-- add links to filtered part list view if time -->
			<!-- or go to part type description??? -->
			<div class="row level1">ARM</div>
			<div class="row level2">SECTION 1-2</div>
			<div class="row level3">CARTRIDGE 1</div>
			<div class="row level3">CARTRIDGE 2</div>

			<div class="row level2">SECTION 3-4</div>
			<div class="row level3">CARTRIDGE 3</div>
			<div class="row level3">CARTRIDGE 4</div>

			<div class="row level2">SECTION 5-6-7</div>
			<div class="row level3">CARTRIDGE 5</div>
			<div class="row level3">CARTRIDGE 6</div>
			<div class="row level3">CARTRIDGE 7</div>

		</div><!-- closes col-md-9 -->
	</div><!-- closes row -->
</div><!-- closes parts index -->


