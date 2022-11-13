<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/treejs/themes/default/style.min.css">

<script src="<?php echo base_url(); ?>assets/treejs/jstree.min.js"></script>
<style>
    .product_image{
        height: 200px!important;
    }
    .product_image_back{
        background-size: contain!important;
        background-repeat: no-repeat!important;
        height: 200px!important;
        background-position-x: center!important;
        background-position-y: center!important;
    }
</style>
<!-- Main content -->
<section class="content" ng-controller="productController">
    <?php
    if ($vproduct) {
        ?>
        <div class="well well-sm">
            <b>Primary Product: <?php echo $vproduct["title"]; ?></b>
            <h3><?php echo $vproduct["sku"]; ?></h3>
        </div>
        <?php
    }
    ?>


    <div class="">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Product</h3>
            </div>
            <div class="panel-body">

                <?php echo $this->session->flashdata('success_msg'); ?>
                <?php echo $this->session->flashdata('error_msg'); ?>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label >Title</label>
                        <input type="text" class="form-control" name="title"  aria-describedby="emailHelp" placeholder="" value="<?php echo $product_obj->title; ?>">
                    </div>
                    <div class="form-group">
                        <label >Short Description</label>
                        <input type="text" class="form-control" name="short_description"  aria-describedby="emailHelp" placeholder="" value="<?php echo $product_obj->short_description; ?>">
                    </div>
                    <div class="form-group">
                        <label >Category         </label><br/>
                        <span class='categorystring'>{{selectedCategory.category_string}}</span>
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".categoryopen" style="margin-left: 21px;">Select Category</button>

                        <input type="hidden" name="category_name" id="category_id" value="<?php echo $product_obj->category_id; ?>">

                    </div>

                    <div class="form-group" >
                        <label >Size/Weight/Quantity/Pc</label>
                        <input type="text" class="form-control " name="description"  aria-describedby="emailHelp" placeholder="" value="<?php echo $product_obj->description; ?>" style="width: 200px;"  />
                    </div>


                    <!--price-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Regular Price</label>
                                <input type="number" class="form-control price_tag_text" id='regular_price' name="regular_price"  aria-describedby="emailHelp" placeholder="" value="<?php echo $product_obj->regular_price; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Sale Price</label>
                                <input type="number" class="form-control price_tag_text" id='sale_price' name="sale_price"  aria-describedby="emailHelp" placeholder="" value="<?php echo $product_obj->sale_price; ?>"> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Final Price</label>
                                <span class="final_price form-control" id='finalprice'><?php echo $product_obj->price; ?></span>
                                <input type="hidden" class="form-control price_tag_text" id='finalprice1' name="price"  aria-describedby="emailHelp" placeholder="" value="<?php echo $product_obj->price; ?>"> 

                            </div>
                        </div>


                    </div>
                    <!--end of price-->



                    <!--pictures-->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <?php
                                if ($product_obj->file_name) {
                                    ?>
                                    <div class="product_image product_image_back" style="background: url(<?php echo (base_url() . "assets/product_images/" . $product_obj->file_name); ?>)">
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="product_image product_image_back" style="background: url(<?php echo (base_url() . "assets/default/default.png"); ?>)">
                                    </div>
                                    <?php
                                }
                                ?>





                                <div class="caption">
                                    <div class="form-group">
                                        <label for="image1">Upload Primary Image</label>
                                        <input type="file" name="picture" />           
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">                           
                            <div class="thumbnail" >
                                <?php
                                if ($product_obj->file_name1) {
                                    ?>
                                    <div class="product_image product_image_back" style="background: url(<?php echo (base_url() . "assets/product_images/" . $product_obj->file_name1); ?>)">
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="product_image product_image_back" style="background: url(<?php echo (base_url() . "assets/default/default.png"); ?>)">
                                    </div>
                                    <?php
                                }
                                ?>             
                                <div class="caption">
                                    <div class="form-group">
                                        <label for="image1">Upload Image 1</label>
                                        <input type="file" name="picture1" />           
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">                           
                            <div class="thumbnail" >
                                <?php
                                if ($product_obj->file_name2) {
                                    ?>
                                    <div class="product_image product_image_back" style="background: url(<?php echo (base_url() . "assets/product_images/" . $product_obj->file_name2); ?>)">
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="product_image product_image_back" style="background: url(<?php echo (base_url() . "assets/default/default.png"); ?>)">
                                    </div>
                                    <?php
                                }
                                ?>               
                                <div class="caption">
                                    <div class="form-group">
                                        <label for="image1">Upload Image 2</label>
                                        <input type="file" name="picture2" />           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--pictures-->

                    <!--product availabilities-->
                    <div class='row'>
                        <div class="col-md-3">    
                            <div class="form-group">
                                <label >Show In Offers</label>
                                <select  name='offer' class='form-control'>
                                    <option value='1' <?php echo $product_obj->offer == '1' ? 'selected' : ''; ?>>Yes</option>
                                    <option value='0' <?php echo $product_obj->offer == '0' ? 'selected' : ''; ?>>No</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">                           
                            <div class="form-group">
                                <label >Product Availabilities</label>
                                <select  name='stock_status' class='form-control'>
                                    <option value='In Stock' <?php echo $product_obj->stock_status == 'In Stock' ? 'selected' : ''; ?>>In Stock</option>
                                    <option value='Out Of Stock'  <?php echo $product_obj->stock_status == 'Out Of Stock' ? 'selected' : ''; ?>>Out Of Stock</option>
                                </select>

                            </div>
                        </div>
                    </div>






                    <button type="submit" name="editdata" class="btn btn-primary">Submit</button>
                    <?php
                    if ($product_obj->status == 1) {
                        ?>
                        <button type="submit" name="removedata" class="btn btn-danger">Remove</button>
                        <?php
                    }
                    ?>
                    <?php
                    if ($product_obj->status == 0) {
                        ?>
                        <button type="submit" name="recoverdata" class="btn btn-warning">Recover</button>
                        <button type="submit" name="deletedata" class="btn btn-danger">Delete</button>
                        <?php
                    }
                    ?>
                </form>
            </div>
        </div>

        <div class="well well-sm">
            <?php
            if (!$product_obj->variant_product_of) {
                ?>
                <a class="btn btn-warning btn-lg" href="<?php echo site_url('ProductManager/variant_product/' . $product_obj->id) ?>">Add Variant Product</a>
                <button class="btn btn-danger btn-lg pull-right"  data-toggle="modal" data-target="#variant_product_model">Make as Variant Product</button>

                <?php
            }
            ?>
            <?php
            if ($product_obj->variant_product_of) {
                ?>

                <a class="btn btn-warning btn-lg" href="<?php echo site_url('ProductManager/variant_product/' . $product_obj->variant_product_of) ?>">Add More Variant Product</a>
                                <button class="btn btn-danger btn-lg pull-right"  data-toggle="modal" data-target="#primary_product_model">Make as Primary Product</button>

                    <?php
            }
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade categoryopen" id="category_model">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select Category</h4>
                </div>
                <div class="modal-body">
                    <div id="using_json_2" class="demo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="variant_product_model">
        <div class="modal-dialog modal-sm" role="document">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Enter Primary Product SKU</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">

                            <input type="text" class="form-control price_tag_text" id='sky_vrt' name="variant_product_of"   aria-describedby="emailHelp" placeholder="" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="make_variant_product" value="make_variant_product">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="modal fade " id="primary_product_model">
        <div class="modal-dialog modal-sm" role="document">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Make Primary Product </h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            It will be a Primary Product, If this product has no variants then It will be listed as separate product.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="make_primary_product" value="make_variant_product">Confirm</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">Product Reports <?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <table id="tableData" class="table table-bordered ">
                <thead>
                    <tr>
                        <th style="width: 20px;">S.N.</th>
                        <th style="width:50px;">Image</th>
                        <th style="width:50px;">SKU</th>
                        <th style="width:100px;">Title</th>
                        <th style="width:100px;">Size/Qnty.</th>
                        <th style="width:50px;">Items Prices</th>
                        <th style="width:50px;">Stock</th>
                        <th style="width:100px;">Variant Product Of</th>
                        <th style="width: 75px;">Edit</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</section>
<!-- end col-6 -->

<link href="<?php echo base_url(); ?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />

<script src="<?php echo base_url(); ?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/table-manage-default.demo.min.js"></script>
<?php
$primaryProduct = $product_obj->id;
if ($product_obj->variant_product_of) {
    $primaryProduct = $product_obj->variant_product_of;
}
?>
<script>
                            $(function () {

                                $('#tableData').DataTable({
                                    "processing": true,
                                    "serverSide": true,
                                    "ajax": {
                                        url: "<?php echo site_url("ProductManager/productReportApi/" . $condition . '/' . $primaryProduct) ?>",
                                        type: 'GET'
                                    },
                                    "columns": [
                                        {"data": "s_n"},
                                        {"data": "image"},
                                        {"data": "sku"},
                                        {"data": "title"},
                                        {"data": 'description'},
                                        {"data": "items_prices"},
                                        {"data": "stock_status"},
                                        {"data": "variant"},
                                        {"data": "edit"}]
                                })
                            }
                            )

</script>





<script src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<?php
$this->load->view('layout/footer');
?> 
<script>
                            $(function () {
                                $(".price_tag_text").keyup(function () {
                                    var rprice = Number($("#regular_price").val());
                                    var sprice = Number($("#sale_price").val());
                                    console.log(sprice, rprice)
                                    if (sprice) {
                                        if (rprice > sprice) {
                                            $("#finalprice").text(sprice);
                                            $("#finalprice1").val(sprice);
                                        } else {
                                            $("#finalprice").text(rprice);
                                            $("#finalprice1").val(rprice);
                                            $("#sale_price").val(0)
                                        }
                                    } else {
                                        $("#finalprice").text(rprice);
                                        $("#finalprice1").val(rprice);
                                        $("#sale_price").val(0)
                                    }
                                })
                            });

</script>

<script>
    Admin.controller('productController', function ($scope, $http, $filter, $timeout) {
        $scope.selectedCategory = {'category_string': '<?php echo $category_string; ?>', 'category_id': ""};

        var url = "<?php echo base_url(); ?>index.php/ProductManager/category_api";
        $http.get(url).then(function (rdata) {
            $scope.categorydata = rdata.data;
            $scope.categorydata = rdata.data;
            $('#using_json_2').jstree({'core': {
                    'data': $scope.categorydata.tree
                }});

            $('#using_json_2').bind('ready.jstree', function (e, data) {
                $timeout(function () {
                    $scope.getCategoryString(4);
                }, 100);
            })
        });



        $scope.getCategoryString = function (catid) {
            console.log(catid)
            var objdata = $('#using_json_2').jstree('get_node', catid);
            var catlist = objdata.parents;
            $timeout(function () {
                $scope.selectedCategory.selected = objdata;
                var catsst = [];
                for (i = catlist.length + 1; i >= 0; i--) {
                    var catid = catlist[i];
                    var catstr = $scope.categorydata.list[catid];
                    if (catstr) {
                        catsst.push(catstr.text);
                    }
                }
                catsst.push(objdata.text);
                $("#category_id").val(objdata.id);
                console.log(objdata.id)
                $scope.selectedCategory.category_string = catsst.join("->")
            }, 100)
        }

        $(document).on("click", "[selectcategory]", function (event) {
            var catid = $(this).attr("selectcategory");
            $("#category_model").modal("hide");
            $scope.getCategoryString(catid);
        })


    })




</script>

