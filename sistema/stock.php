<?php include_once "includes/header.php"; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">stock minimo o nulo de productos</h1>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<<th>EAN</th>
                            <th>Nombre</th>
                            <th>Stock</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM producto");
						$result = mysqli_num_rows($query);
                        $resultado = array();
                        while($result = $query->fetch_array(MYSQLI_BOTH)){
                         $resultado[] = $result;
}

for($i=0;$i<count($resultado);$i++){
	$alert = "";
    if($resultado[$i]['minimo'] >= $resultado[$i]['existencia']){
        echo "<tr style='background-color:red; color: #fff;'>";
		$alert = '<div class="alert alert-success" role="alert">
                        Producto se esta agotando
                    </div>';
    }else{
        echo "<tr>";
    }
    echo "<td>".$resultado[$i]['codigo']."</td>";
    echo "<td>".$resultado[$i]['descripcion']."</td>";
    echo "<td>".$resultado[$i]['existencia']."</td>";
    echo "</tr>";
}

?>
										<?php 
                                         ?>
								</tr>
						<?php 
						 ?>
					</tbody>
					<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/sweetAlert.js"><script>

				</table>
				
			</div>

		</div>
	</div>

</div>
<!-- /.container-fluid -->





<?php include_once "includes/footer.php"; ?>