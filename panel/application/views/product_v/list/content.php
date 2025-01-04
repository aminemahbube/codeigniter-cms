<div class="row">
<div class="col-md-12">
<h4 class="m-b-lg">
    Ürün Listesi
    <a href="<?php echo base_url("product/new_form"); ?>" class="btn pull-right btn-outline btn-info btn-xs"><i class="fa fa-plus"></i> Yeni Ekle</a>
</h4>
</div>
<div class="col-md-12">
			<div class="widget p-lg">

                <?php if(empty($items)) { ?>

                <div class="alert alert-warning text-center">
								<h5 class="alert-title">Kayıt Bulunamadı</h5>
								<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("product/new_form"); ?>">tıklayınız.</a> </p>
							</div>
                    
                <?php } else { ?>        

					<table class="table table-hover table-striped">
						<thead>
                            <th>#id</th>
                            <th>url</th>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>Durumu</th>
                            <th>İşlem</th>
                        </thead>
                        <tbody>
                        
                            <?php foreach($items as $item) { ?>
                            
                                <tr>
                                <td>#<?php echo $item->id; ?></td>
                                <td><?php echo $item->url; ?></td>
                                <td><?php echo $item->title; ?></td>
                                <td><?php echo $item->description; ?></td>
                                <td>
                                    <input 
                                    data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    data-color="#10c469"  
                                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
							    </td>
                                <td>
                                    <a href="<?php echo base_url("product/update_form/$item->id"); ?>" class="btn btn-primary btn-sm btn-outline "><i class="fa fa-pencil-square"></i> Düzenle</a>
								<button 
                                    data-url="<?php echo base_url("product/delete/$item->id"); ?>"
                                    class="btn btn-purple btn-sm btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                                </td>
                            </tr>
                    

                            <?php } ?>
                        </tbody>
					</table>
                
                <?php } ?>    

				</div><!-- .widget -->
			</div><!-- END column -->
</div>