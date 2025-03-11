<div class="row">
<div class="col-md-12">
<h4 class="m-b-lg">
    Eğitim Listesi
    <a href="<?php echo base_url("courses/new_form"); ?>" class="btn pull-right btn-outline btn-info btn-xs"><i class="fa fa-plus"></i> Yeni Ekle</a>
</h4>
</div>
<div class="col-md-12">
			<div class="widget p-lg">

                <?php if(empty($items)) { ?>

                <div class="alert alert-warning text-center">
								<h5 class="alert-title">Kayıt Bulunamadı</h5>
								<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("courses/new_form"); ?>">tıklayınız.</a> </p>
							</div>
                    
                <?php } else { ?>        

					<table class="table table-hover table-striped table-bordered content-container">
						<thead>
                            <th class="order"><i class="fa fa-reorder"></i></th>
                            <th class="w50">#id</th>
                            <th>Başlık</th>
                            <th>Tarih</th>
                            <!-- <<th>Açıklama</th> -->
                            <th>Görsel</th>
                            <th>Durumu</th>
                            <th>İşlem</th>
                        </thead>
                        <tbody class="sortable" data-url="<?php echo base_url("courses/rankSetter"); ?>">
                        
                            <?php foreach($items as $item) { ?>
                            
                                <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order w50"><i class="fa fa-reorder"></i></td>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td class="order"><?php echo $item->title; ?></td>
                                <td class="w200 text-center"><?php echo get_readable_date($item->event_date); ?></td>
                                <!-- <td><?php //echo $item->description; ?></td> -->
                                <td class="w100">
                                    <div style="text-align: center;">
                                    <img width="75" src="<?php echo base_url("uploads/$viewFolder/$item->img_url"); ?>"
                                        alt="" class="img-rounded">
                                </td>
                                <td class="text-center w100">
                                    <input 
                                    data-url="<?php echo base_url("courses/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    data-color="#10c469"  
                                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
							    </td>
                                <td class="order w200">
                                    <a href="<?php echo base_url("courses/update_form/$item->id"); ?>" class="btn btn-primary btn-sm btn-outline "><i class="fa fa-pencil-square"></i> Düzenle</a>
								<button 
                                    data-url="<?php echo base_url("courses/delete/$item->id"); ?>"
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