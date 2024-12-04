<?php 

   $pageName = 'Books Details';
   $breadCrumbs = 'Books Details';
   include('inc/css_body_side_bar.php');
   include('inc/top_nav_bar.php');
   //require('book_list_data.php');
   ?>
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <h4 class="card-title mb-0">Books Description</h4>
                        </div>
                        <div class="iq-card-body pb-0">
                           <div class="description-contens align-items-top row">
                              <div class="col-md-6">
                                 <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                       <div class="row align-items-center">
                                          
                                          

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";
import { getFirestore, doc, getDoc } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js";
        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyAGZ_XQySQSvieXp3OnX0WNLJTqRpyhIcE",
            authDomain: "epub-88cb9.firebaseapp.com",
            projectId: "epub-88cb9",
            storageBucket: "epub-88cb9.appspot.com",
            messagingSenderId: "864025277482",
            appId: "1:864025277482:web:99e99045dd5e01a8d7ff53"
        };

        // Initialize Firebase
// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);   

const urlParams = new URLSearchParams(window.location.search);
const docId = urlParams.get('id');

// Replace "yourCollectionName" and "yourDocumentId" with your actual values
const docRef = doc(db, "epubs", docId);

// Get the document
getDoc(docRef)
  .then((doc) => {
    if (doc.exists()) {
      //console.log("Document data:", doc.data());
      const documentData = doc.data();
      //console.log("Image URL:",documentData.imageUrl);
      const detailsDiv = document.getElementById("documentDetails");
      
      const genres = documentData.genres;
        let genreButtons = "";

        // Loop through genres and create buttons
        genres.forEach(genre => {
         // genreButtons += `<button class="btn btn-primary m-1">${genre}</button>`;

          const capitalizedGenre = genre.charAt(0).toUpperCase() + genre.slice(1);
          genreButtons += `<button class="btn btn-secondary m-1" style="cursor: auto;">${capitalizedGenre}</button>`;
       
        });
    

     
      detailsDiv.innerHTML = `<ul id="description-slider" class="list-inline p-0 m-0  d-flex align-items-center">
        <li>
           <a href="javascript:void(0);">
           <img src="${documentData.imageUrl}" class="img-fluid w-100 rounded" alt="">
           </a>
        </li>`;

        const bookData = document.getElementById("bookData");
        bookData.innerHTML = `<h3 class="mb-3">${documentData.title}</h3>

                                       <div class="text-primary mb-4"> ${genreButtons}</div>
                                       <div class="text-primary mb-4">Author: <span class="text-body">${documentData.author}</span></div>
                                       <span class="text-dark mb-4 pb-4 iq-border-bottom d-block">${documentData.about}</span>
                                       <div class="text-primary mb-4"><span class="text-body"><a href="${documentData.epubUrl}" target="_blank">View File &nbsp; <i class="fa fa-external-link" aria-hidden="true"></i>
                                          </a></span></div>`;
      
    } else {
      // Handle the case where the document doesn't exist
      console.log("No such document!");
    }
  })
  .catch((error) => {
    console.error("Error getting document:", error);
  });


    </script>


                                          <div class="col-9" id="documentDetails">
                                             
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0" id="bookData">
                                       
                                                                           
                                       
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
      <!-- Wrapper END -->
      <?php include('inc/footer.php');?>
      <?php include('inc/load_javascript.php');?>