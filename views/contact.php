   <div class="container px-5 my-5">
       <div class="row justify-content-center">
           <div class="col-lg-8">
               <div class="card border-0 rounded-3 shadow-lg">
                   <div class="card-body p-4">
                       <div class="text-center">
                           <div class="h1 fw-light">Formulaire de contact</div>

                       </div>

                       <form id="contactForm">

                           <!-- Name Input -->
                           <div class="form-floating mb-3">
                               <div class="form-floating mb-3">
                                   <input class="form-control" id="name" type="text" placeholder="Name" />
                                   <label for="name">Name</label>
                               </div>

                               <!-- Email Input -->
                               <div class="form-floating mb-3">
                                   <input class="form-control" id="emailAddress" type="email"
                                       placeholder="Email Address" />
                                   <label for="emailAddress">Email Address</label>
                               </div>

                               <!-- Message Input -->
                               <div class="form-floating mb-3">
                                   <textarea class="md-textarea form-control" id="message" placeholder="Message"
                                       rows="10" cols="35"></textarea>
                                   <label for="message">Message</label>
                               </div>
                               <!-- Submit button -->
                               <div class="d-grid">
                                   <button class="btn btn-primary btn-lg " id="submitButton"
                                       type="submit">Envoyer</button>
                               </div>
                       </form>
                       <!-- End of contact form -->

                   </div>
               </div>
           </div>
       </div>
   </div>