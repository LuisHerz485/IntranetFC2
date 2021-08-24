<div class="content-wrapper">
    <div class="content=header">
        <div class="content=fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Consulta RENIEC</a></li>
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
                        <h3 class="card-title">Consulta la informacion RENIEC</h3>
                    </div>
                    <form name="consultadni" action="#" id="consultadni" method="POST">
                        <h3><strong>Ingresa el numero de DNI a consultar:</strong></h3>
                        <input type="text" name="numerodni">
                        <button  id="" type="submit" class="btn btn-primary btn-block">Consultar</button>
                        <?php
                            
                            if(!empty($_POST['numerodni'])){
                              
                                echo consultadni($_POST['numerodni']);
                            }else{
                                
                            }
                          
                           
                        ?>

                    </form>

                    

                </div>
            </div>
        </div>
    </div>
</div>