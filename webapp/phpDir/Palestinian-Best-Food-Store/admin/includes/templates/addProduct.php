<div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="register-form" >
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input name="productName" class="form-control" type="text">
                                </div>
                                <div class="col-md-6">
                                    <label>Price</label>
                                    <input name="price" class="form-control" type="text">
                                </div>
                                <div class="col-md-6">
                                    <label>Discription</label>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="txtreview" rows="4" cols="173">
                                    </textarea>
                                    <br><br>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-20 control-label" for="product_categorie">Type</label>
                                        <div class="col-md-20">
                                            <select id="product_categorie" name="type" class="form-control">
                                                <option value="" selected disabled hidden>Choose here</option>
                                                <option value="authenticated">Authenticated Palestinian Food</option>
                                                <option value="packaged">Pre-packaged Palestinian meals</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-20 control-label" for="product_categorie">Size</label>
                                        <div class="col-md-20">
                                            <select id="product_categorie" name="size" class="form-control">
                                                <option value="" selected disabled hidden>Choose here</option>
                                                <option value="kg">kg</option>
                                                <option value="liter">liter</option>
                                                <option value="pices">pices</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="filebutton">main_image1</label>
                                        <div class="col-md-4">
                                            <input type="file" id="image" name="image" accept="image/png, .jpeg, .jpg, image/gif"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="filebutton">main_image2</label>
                                        <div class="col-md-4">
                                            <input id="image2" name="image2" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="filebutton">main_image3</label>
                                        <div class="col-md-4">
                                            <input id="image3" name="image3" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href=""><button class="btn" name="addProduct">Submit</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
