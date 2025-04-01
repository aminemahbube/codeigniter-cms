<div class="row">
<div class="col-md-12">
<h4 class="m-b-lg">
    <?php echo "<b>$gallery->title</b> galerisine ait videolar" ; ?> 
    <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id"); ?>" class="btn pull-right btn-outline btn-info btn-xs"><i class="fa fa-plus"></i> Yeni Ekle</a>
</h4>
</div>
<div class="col-md-12">
			<div class="widget p-lg">

                <?php if(empty($items)) { ?>

                <div class="alert alert-warning text-center">
								<h5 class="alert-title">Kayıt Bulunamadı</h5>
								<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id"); ?>">tıklayınız.</a> </p>
							</div>
                    
                <?php } else { ?>        

					<table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="order"><i class="fa fa-reorder"></i></th>
                        <th class="w50">#id</th>
                        <th>url</th>
                        <th>Görsel</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("galleries/rankGalleryVideoSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td><?php echo $item->url; ?></td>
                                <td class="text-center w100">
                                    <iframe
                                        width="75"
                                        src="<?php echo $item->url; ?>"
                                        frameborder="0"
                                        gesture="media"
                                        allow="encrypted-media"
                                        allowfullscreen>

                                    </iframe>
                                </td>
                                <td class="text-center w100">
                                    <input
                                        data-url="<?php echo base_url("galleries/galleryVideoIsActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="order">
                                    <a href="<?php echo base_url("galleries/update_gallery_video_form/$item->id"); ?>" class="btn btn-primary btn-sm btn-outline "><i class="fa fa-pencil-square"></i> Düzenle</a>
								<button 
                                    data-url="<?php echo base_url("galleries/galleryVideoDelete/$item->id/$item->gallery_id"); ?>"
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