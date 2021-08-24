<div class="content-wrapper">
    <div class="content=header">
        <div class="content=fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Consulta RUC</a></li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Consulta la informacion RUC</h3>
                    </div>
                    <form name="consultaruc" action="#" id="consultaruc" method="POST">
                        <h3><strong>Ingresa el numero de RUC:</strong></h3>
                        <input type="text" name="numeroruc">
                        <button  id="" type="submit" class="btn btn-primary btn-block">Consultar</button>
                        <?php
                            
                            if(!empty($_POST['numeroruc'])){
                              
                                echo consultaruc($_POST['numeroruc']);
                            }else{
                                
                            }
                          
                           
                        ?>

                    </form>

                    

                </div>
            </div>
        </div>
    </div>
</div>