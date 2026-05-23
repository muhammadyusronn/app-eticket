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
       <?php echo $this->session->flashdata('msg'); ?>
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
         <div class="row g-3 mb-3">
           <div class="col-md-12">
             <div class="card ">
               <div class="card-body">
                 <div class="d-flex align-items-center">
                   <div class="flex-fill ms-4">
                     <div>Judul :</div>
                     <div><?= $ticket->title ?></div>
                     <div class="text-truncate mt-4">Deksripsi :</div>
                     <div><?= $ticket->description ?></div>
                   </div>

                 </div>
               </div>
             </div>
           </div>
         </div> <!-- Row end  -->
         <div class="row g-3 mb-3">
           <div class="card border-0 shadow-sm mt-4">
             <?php if ($ticket->status_id != 4) { ?>
               <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center mb-4">
                   <h5 class="fw-bold mb-0">Update Ticket Status</h5>
                 </div>
                 <?= form_open($url) ?>
                 <input type="hidden" name="ticket_id" id="ticket_id" value="<?= $ticket->id ?>">
                 <!-- Status -->
                 <div class="mb-3">
                   <label class="form-label fw-semibold">
                     Status Ticket
                   </label>
                   <select class="form-select" id="ticket_status" name="ticket_status">
                     <option value="">Choose Status</option>
                     <?php foreach ($status as $s): ?>
                       <option value="<?= $s->id ?>" <?= ($s->id == $ticket->status_id) ? 'selected' : '' ?>>
                         <?= $s->status_name ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>
                 <!-- Pending Form -->
                 <div id="pending-section" style="display:none;">
                   <div class="mb-3">
                     <label class="form-label fw-semibold">
                       Alasan Pending
                     </label>
                     <textarea class="form-control" rows="4" name="pending_reason"
                       placeholder="Isi alasan pending..."><?= $ticket->pending_reason ?></textarea>
                   </div>
                 </div>
                 <!-- Solved Form -->
                 <div id="solved-section" style="display:none;">
                   <div class="mb-3">
                     <label class="form-label fw-semibold">
                       Akar Masalah
                     </label>
                     <textarea class="form-control" rows="4" name="root_cause"
                       placeholder="Apa yang menyebabkan masalah ini?"><?= $ticket->root_cause ?></textarea>
                   </div>
                   <div class="mb-3">
                     <label class="form-label fw-semibold">
                       Solusi
                     </label>
                     <textarea class="form-control" rows="4" name="solution"
                       placeholder="Jelaskan solusi..."><?= $ticket->solution ?></textarea>
                   </div>
                   <div class="mb-3">
                     <label class="form-label fw-semibold">
                       Tindakan Pencegahan
                     </label>
                     <textarea class="form-control" rows="3" name="preventive_action"
                       placeholder="Jelaskan tindakan pencegahan..."><?= $ticket->preventive_action ?></textarea>
                   </div>
                 </div>
                 <div class="text-end">
                   <button type="submit" name="submit" class="btn btn-primary px-4">
                     Update Status
                   </button>
                 </div>
                 <?= form_close(); ?>
               </div>
             <?php } ?>
           </div>
         </div> <!-- Row end  -->
         <div class="row g-3">
           <div class="col-md-12">
             <div class="row g-3">
               <div class="col-lg-12 col-md-6">
                 <ul class="list-unstyled res-set">
                   <li class="card mb-2">
                     <div class="card-body">
                       <div class="timeline-item-post">
                         <div>
                           <?php foreach ($comments as $c): ?>
                             <div class="d-flex mt-3 pt-3 border-top">
                               <img class="avatar rounded-circle"
                                 src="<?= ($c->photo == "") ? base_url('assets/images/xs/avatar5.jpg') : base_url($c->photo) ?>"
                                 alt="">
                               <div class="flex-fill ms-3 text-truncate">
                                 <p class="mb-0"><span><?= html_escape($c->name) ?></span> <small
                                     class="msg-time"><?= html_escape($c->created_at) ?></small></p>
                                 <span class="text-muted"><?= $c->comment ?></span>
                                 <?php if ($c->attachment != '0') : ?>

                                   <?php $attachments = explode('@!@', $c->attachment); ?>

                                   <div class="mt-2 d-flex flex-column gap-1">

                                     <?php foreach ($attachments as $file) : ?>

                                       <a href="<?= base_url('upload/attachment/comments/' . $file) ?>" target="_blank"
                                         class="text-decoration-none">

                                         <i class="icofont-attachment"></i>

                                         <?= basename($file) ?>

                                       </a>

                                     <?php endforeach; ?>

                                   </div>

                                 <?php endif; ?>
                               </div>
                             </div>
                           <?php endforeach; ?>
                         </div>
                       </div>
                       <?php if ($ticket->status_id != 4) { ?>
                         <?= form_open_multipart('ticket/comment') ?>
                         <div class="mt-4">
                           <!-- Message -->
                           <input type="hidden" name="ticket_id" value="<?= $ticket->id ?>">
                           <textarea class="form-control" name="comment" placeholder="Post" rows="4"></textarea>
                           <div class="py-3 d-flex justify-content-between align-items-center">
                             <!-- Upload -->
                             <div>
                               <input type="file" id="attachment" name="attachment[]" class="d-none" multiple>
                               <label for="attachment" class="px-3 cursor-pointer" title="Upload Images">
                                 <i class="icofont-paper-clip"></i>
                               </label>
                               <!-- file preview -->
                               <small id="file-name" class="text-muted"></small>
                             </div>
                             <!-- Submit -->
                             <button type="submit" name="submit" class="btn btn-primary mt-2 mt-sm-0">
                               Send
                             </button>
                           </div>
                         </div>
                         <?= form_close(); ?>
                       <?php } ?>
                     </div>
                   </li> <!-- .Card End -->
                 </ul>

               </div>
             </div>
           </div>
         </div> <!-- Row end  -->

       </div>
       <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12">
         <div class="card mb-2">
           <div class="card-body card-body-height py-4">
             <div class="row">
               <div class="col-lg-12 col-md-12">
                 <h6 class="mb-0 fw-bold mb-3">Ticket Information</h6>
                 <ul class="list-unstyled mb-0">
                   <li class="mb-2"><span class="fw-bold me-2">Category:</span><span><?= $ticket->category ?></span>
                   </li>
                   <li class="mb-2"><span class="fw-bold me-2">Module:</span><span><?= $ticket->module_name ?></span>
                   </li>
                   <li class="mb-2"><span class="fw-bold me-2">
                       Petugas:</span><span><?= $ticket->petugas ?></span>
                   </li>
                   <li class="mb-2"><span class="fw-bold me-2">
                       Ditugaskan pada :</span><span><?= $ticket->assigned_at ?></span>
                   </li>
                   <?php if ($ticket->status_id != 4) { ?>
                     <li class="mb-2"><span class="fw-bold me-2">
                         Waktu realtime proses
                         :</span><span><?= elapsed_time(date('Y-m-d H:i:s'), $ticket->assigned_at) ?></span>
                     </li>
                   <?php } ?>

                   <?php if ($ticket->status_id == 4) { ?>
                     <li class="mb-2"><span class="fw-bold me-2">
                         Waktu penyelesaian
                         :</span><span><?= $ticket->status_changed_at ?></span>
                     </li>
                     <li class="mb-2"><span class="fw-bold me-2">
                         Lama penyelesaian
                         :</span><span><?= elapsed_time($ticket->status_changed_at, $ticket->assigned_at) ?></span>
                     </li>
                   <?php
                    }; ?>
                 </ul>
               </div>
             </div>
           </div>
         </div>
         <div class="card">
           <div class="row">
             <div class="col-lg-12 col-md-12">
               <div class="card">
                 <div class="card-body">
                   <h6 class="fw-bold mb-3 text-danger">Lampiran</h6>
                   <div class="flex-grow-1">
                     <?php if (count($attachment) > 0): ?>
                       <?php foreach ($attachment as $i): ?>
                         <div class="py-2 d-flex align-items-center border-bottom">
                           <div class="d-flex ms-3 align-items-center flex-fill">
                             <span
                               class="avatar lg light-danger-bg rounded-circle text-center d-flex align-items-center justify-content-center">
                               <i class="icofont-file-alt fs-5"></i>
                             </span>
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
       </div>
     </div>
   </div>
 </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"
   integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
 </script>
 <script>
   $(document).ready(function() {
     function toggleStatusForm(status) {
       $('#pending-section').hide();
       $('#solved-section').hide();

       if (status === '3') {

         $('#pending-section').fadeIn(200);

         $('#status-badge')
           .removeClass()
           .addClass('badge bg-warning')
           .text('Pending');

       } else if (status === '4') {

         $('#solved-section').fadeIn(200);

         $('#status-badge')
           .removeClass()
           .addClass('badge bg-success')
           .text('Solved');
       }
     }

     $('#attachment').on('change', function() {

       let files = [];

       $.each(this.files, function(index, file) {

         files.push(file.name);

       });

       $('#file-name').text(files.join(', '));

     });

     // onchange status
     $('#ticket_status').on('change', function() {

       let status = $(this).val();

       toggleStatusForm(status);
     });

     // default selected value
     toggleStatusForm($('#ticket_status').val());

   });
 </script>