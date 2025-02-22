<div class="row">
<div class="col-md-12">
<h4 class="m-b-lg">
    Haber Listesi
    <a href="<?php echo base_url("news/new_form"); ?>" class="btn pull-right btn-outline btn-info btn-xs"><i class="fa fa-plus"></i> Yeni Ekle</a>
</h4>
</div>
<div class="col-md-12">
			<div class="widget p-lg">

                <?php if(empty($items)) { ?>

                <div class="alert alert-warning text-center">
								<h5 class="alert-title">Kayıt Bulunamadı</h5>
								<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("news/new_form"); ?>">tıklayınız.</a> </p>
							</div>
                    
                <?php } else { ?>        

					<table class="table table-hover table-striped table-bordered content-container">
						<thead>
                            <th class="order"><i class="fa fa-reorder"></i></th>
                            <th class="w50">#id</th>
                            <th>Başlık</th>
                            <th>url</th>
                            <!-- <th>Açıklama</th> -->
                            <th>Haber Türü</th>
                            <th>Görsel</th>
                            <th>Durumu</th>
                            <th>İşlem</th>
                        </thead>
                        <tbody class="sortable" data-url="<?php echo base_url("news/rankSetter"); ?>">
                        
                            <?php foreach($items as $item) { ?>
                            
                                <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td class="w100 text-center"><?php echo $item->title; ?></td>
                                <td><?php echo $item->url; ?></td>
                                <!-- <td><?php //echo $item->description; ?></td> -->
                                <td class="w50 text-center"><?php echo $item->news_type; ?></td>
                                <td>
                                    <?php if($item->news_type == "image") { ?>
                                        <div style="text-align: center;">
                                        <img width="75" src="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>"
                                        alt=""
                                        class="img-rounded">
                                    
                                    <?php } if ($item->news_type == "video") { ?>
                                    <center>
                                    <iframe
                                        height="75" width="225"
                                        src="<?php echo $item->video_url; ?>"
                                        gesture="media"
                                        allow="encrypted-media"
                                        allowfullscreen>
                                    </iframe>
                                    </center>
                                    <?php } ?>
                                </td>
                                <td>
                                    <center>
                                    <input 
                                    data-url="<?php echo base_url("news/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    data-color="#10c469"  
                                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
							    </td></center>
                                <td class="order">
                                    <a href="<?php echo base_url("news/update_form/$item->id"); ?>" class="btn btn-primary btn-sm btn-outline "><i class="fa fa-pencil-square"></i> Düzenle</a>
								<button 
                                    data-url="<?php echo base_url("news/delete/$item->id"); ?>"
                                    class="btn btn-danger btn-sm btn-outline remove-btn">
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