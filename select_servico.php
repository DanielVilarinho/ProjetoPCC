<?php
include("conn.php");


         $categoria = $_GET['categoria'];

         $query = $conn->prepare("SELECT id_servico, nome_servico FROM servicos WHERE id_categoria=:id_categoria ORDER BY nome_servico");

         $cat = ['id_categoria' => $categoria];
        
         $query->execute($cat);

         $registros = $query->fetchAll(PDO::FETCH_ASSOC);

         foreach($registros as $option){
            ?>
            <option value="<?php echo $option['id_servico']?>"><?php echo $option['nome_servico']?></option>

          <?php  
         }

?>