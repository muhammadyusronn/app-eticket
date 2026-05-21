 <!-- Body: Body -->
 <div class="body d-flex py-lg-3 py-md-2">
   <div class="container-xxl">
     <div class="row align-items-center">
       <div class="border-0 mb-4">
         <div
           class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
           <h3 class="fw-bold mb-0">Tickets Detail</h3>
         </div>
       </div>
     </div> <!-- Row end  -->
     <div class="row g-3">
       <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12">
         <div class="row g-3 mb-3">
           <div class="col-md-4">
             <div class="card ">
               <div class="card-body">
                 <div class="d-flex align-items-center">
                   <div class="avatar lg  rounded-1 no-thumbnail bg-lightyellow color-defult"><i
                       class="icofont-optic fs-4"></i></div>
                   <div class="flex-fill ms-4 text-truncate">
                     <div class="text-truncate">Status</div>
                     <span class="badge bg-<?= $ticket->status_class ?>"><?= $ticket->status_name; ?></span>
                   </div>

                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-4">
             <div class="card ">
               <div class="card-body">
                 <div class="d-flex align-items-center">
                   <div class="avatar lg  rounded-1 no-thumbnail bg-lightblue color-defult">
                     <img src="<?= base_url($ticket->image) ?>" style="width: 90%; height: 90%; object-fit: cover;"
                       alt="avatar">
                   </div>
                   <div class="flex-fill ms-4 text-truncate">
                     <div class="text-truncate">Pelapor</div>
                     <span class="fw-bold"><?= $ticket->pelapor; ?></span>
                   </div>

                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-4">
             <div class="card ">
               <div class="card-body">
                 <div class="d-flex align-items-center">
                   <div class="avatar lg  rounded-1 no-thumbnail bg-lightgreen color-defult"><i
                       class="icofont-clock-time fs-4"></i></div>
                   <div class="flex-fill ms-4 text-truncate">
                     <div class="text-truncate">Waktu Lapor</div>
                     <span class="badge bg-primary"><?= $ticket->reported_at ?></span>
                   </div>

                 </div>
               </div>
             </div>
           </div>
         </div> <!-- Row end  -->
         <div class="row g-3">
           <div class="col-md-12">
             <div class="card mb-3">
               <div class="card-body">
                 <h6 class="fw-bold mb-3 text-danger"><?= $ticket->title ?></h6>
                 <?= $ticket->description ?>
               </div>
             </div>
             <div class="row g-3">
               <div class="col-lg-12 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <h6 class="fw-bold mb-3 text-danger">Bug Image Atteched</h6>
                     <div class="flex-grow-1">
                       <?php if (count($attachment) > 0): ?>
                         <?php foreach ($attachment as $i): ?>
                           <div class="py-2 d-flex align-items-center border-bottom">
                             <div class="d-flex ms-3 align-items-center flex-fill">
                               <span
                                 class="avatar lg light-danger-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i
                                   class="icofont-file-alt fs-5"></i></span>
                               <div class="d-flex flex-column ps-3">
                                 <h6 class="fw-bold mb-0 small-14"><?= basename($i->attachment) ?></h6>
                               </div>
                             </div>
                             <a href="<?= base_url('upload/attachment/' . $i->attachment) ?>" target="_blank"
                               class="btn light-danger-bg text-end" download>Open</a>
                           </div>
                         <?php endforeach; ?>
                       <?php else: ?>
                         <div class="py-2 d-flex align-items-center border-bottom">
                           <div class="d-flex ms-3 align-items-center flex-fill">
                             <span
                               class="avatar lg light-danger-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i
                                 class="icofont-file-alt fs-5"></i></span>
                             <div class="d-flex flex-column ps-3">
                               <h6 class="fw-bold mb-0 small-14">No Attachment</h6>
                             </div>
                           </div>
                         </div>
                       <?php endif; ?>
                     </div>
                   </div>
                 </div>

               </div>
             </div>
           </div>
         </div> <!-- Row end  -->
       </div>
       <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12">
         <div class="card">
           <div class="card-body card-body-height py-4">
             <div class="row">
               <div class="col-lg-12 col-md-12">
                 <h6 class="mb-0 fw-bold mb-3">Ticket Chat</h6>
                 <div class="card mb-2">
                   <div class="card-body">
                     <div class="post">
                       <textarea class="form-control" placeholder="Post" rows="4"></textarea>
                       <div class="py-3">
                         <a href="#" class="px-3 " title="upload images"><i class="icofont-ui-camera"></i></a>
                         <a href="#" class="px-3 " title="upload video"><i class="icofont-video-cam"></i></a>
                         <a href="#" class="px-3 " title="Send for signuture"><i class="icofont-pen-alt-2"></i></a>
                         <button class="btn btn-primary float-sm-end  mt-2 mt-sm-0">Sent</button>
                       </div>
                     </div>
                   </div>
                 </div> <!-- .Card End -->
                 <ul class="list-unstyled res-set">
                   <li class="card mb-2">
                     <div class="card-body">
                       <div class="d-flex mb-3 pb-3 border-bottom">
                         <img class="avatar rounded-circle" src="assets/images/xs/avatar1.jpg" alt="">
                         <div class="flex-fill ms-3 text-truncate">
                           <h6 class="mb-0"><span>Nellie Maxwell</span> <span class="text-muted small">posted a
                               status</span></h6>
                           <span class="text-muted">3 hours ago</span>
                         </div>
                       </div>
                       <div class="timeline-item-post">
                         <h6>Internet Not Working for Last 2 Days</h6>
                         <p>On the other hand, if the Internet doesn't work on other devices too, then the problem is
                           most likely with the router or the Internet connection itself</p>
                         <div class="mb-2 mt-4">
                           <a class="me-lg-4 me-2 text-primary" href="#"><i class="icofont-speech-comments"></i> Comment
                             (2)</a>
                         </div>
                         <div>
                           <div class="d-flex mt-3 pt-3 border-top">
                             <img class="avatar rounded-circle" src="assets/images/xs/avatar2.jpg" alt="">
                             <div class="flex-fill ms-3 text-truncate">
                               <p class="mb-0"><span>Zoe Wright</span> <small class="msg-time">1 hour ago</small></p>
                               <span class="text-muted">One good way to fix the router is to restart it.</span>
                             </div>
                           </div>
                           <div class="d-flex mt-3 pt-3 border-top">
                             <img class="avatar rounded-circle" src="assets/images/xs/avatar3.jpg" alt="">
                             <div class="flex-fill ms-3 text-truncate">
                               <p class="mb-0"><span>Diane Fisher</span> <small class="msg-time">1 hour ago</small></p>
                               <span class="text-muted">Turn on the modem and one minute later turn on the router. Wait
                                 for a few minutes and check”</span>
                             </div>
                           </div>
                         </div>
                       </div>
                       <div class="mt-4">
                         <textarea class="form-control" placeholder="Replay"></textarea>
                       </div>
                     </div>
                   </li> <!-- .Card End -->
                 </ul>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>