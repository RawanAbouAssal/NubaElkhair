<?php         
include_once "donatorheader.php";
include_once "Classes.php";
?>

<div class="section-heading text-center">
<h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
</div>

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category"> <em></em></span>
          <h2></h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category"> <em></em></span>
          <h2><br></h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category"> <em></em></span>
          <h2><br></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="assets/images/help.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2> Support Children with Special Needs </h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 Details
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  More than 100 children are on the waiting list in the “We Are All One in Nuba Elkhair” activity... If you specialize in the field of communication - skills development - or behavior modification, share with us your time, knowledge and effort to serve children with special needs for families in need.<a href="https://www.google.com/search?q=best+free+css+templates" target="_blank"></a> </div>
              </div>
            </div>
          
            
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                
                <h4>Support<br><span>Empowering Families in Need</span></h4>
              </li>
              <li>
               
                <h4>Involvement<br><span>Join Us in Serving Special Needs Children</span></h4>
              </li>
              <li>
              
                <h4>Collaboration<br><span>Working Together for Positive Change</span></h4>
              </li>
              <li>
                
                <h4>Opportunity<br><span>Making a Lasting Impact on Young Lives</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  

 
       

  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>|Features</h6>
            <h2>Find Your choice Right Now!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Ramadan</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Eid al-Adha</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Orphanage</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Bags <span>600</span></li>
                
                          <li>Payment Process <span>Cash </span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/bag.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Ramadan</h4>
                      <p>Don't forget Zakat Al-Fitr in the holy month of Ramadan! 🌟.💡 Pay Zakat Al-Fitr now to be ready to accept and distribute it at the appropriate time.
                      <br><br> Ramadan is near, but this year people's circumstances are more difficult than ever. Each one of us can contribute the price of a food carton or (part of it) and bring joy and happiness into their homes.👨‍👩‍👧‍👦</p>
                      <div class="icon-button">
                        <a href="doante.html"><i class="fa fa-calendar"></i> Donate</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Dabih <span>320 </span></li>
                         
                          <li>Payment Process <span>cash</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/sheep1.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Detail Info About Eid al-Adha</h4>
                      <p>Many poor people are waiting for you to return to them with meat.. Your sacrifice with the charity bout starts with a charity share at 200 pounds, and the price of the municipal bond is 8,500 pounds.. And your legal share of the sacrifice will reach you until you have a share of 10 kilos per person 🤝   <br><br></p>
                      <div class="icon-button">
                        <a href="doante.html"><i class="fa fa-calendar"></i> Donate</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Dars <span>45 </span></li>
                         
                          <li>Payment Process <span>cash</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/orphans.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Orphanage</h4>
                      <p>We have a house that the children of the house dream of renovating and leaving them with a human place to live in and have breakfast in a clean and beautiful place in Ramadan.. Their dream is not far off as long as the good people always have good hearts and it will help them achieve their dream of renovating the house 🤝🌙💚 <br><br>Donate with us, the value of the share is 100 pounds, perhaps it will be saved through a pure supplication in the anxious days of orphans, perhaps they are closer to us.</p>
                      <div class="icon-button">
                        <a href="doante.html"><i class="fa fa-calendar"></i> Donate</a>
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

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Another Activties</h6>
            <h2>We Provide The Best Activties You Like</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="#"><img src="assets/images/famliy.jpg" alt=""></a>
            <span class="category">Supporting Families</span>
            <h6>500 EGP</h6>
            <h4><a href="#">Join The Goodness Squad in Their Mission of Charity and Debt Relief</a></h4>
            <ul>
            <li>The Goodness Squad is in the Goodness Bout No. 265, and the secret of all goodness is in this number precisely because it is the number of verse 265 of Surah Al-Baqarah in the Holy Qur’an.. And in implementation of the words of God Almighty, they dedicated themselves to paying off the debts of families and the sick in the month of Ramadan, but their journey will not be completed with success except with your donation and support for them and for everyone. I need the year</li>
            </ul>
            <div class="main-button">
              <a href="donations.php">Donate</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="#"><img src="assets/images/cloth.jpg" alt=""></a>
            <span class="category">Charitable Initiatives</span>
            <h6>250 EGP</h6>
            <h4><a href="#"> Providing Shelter and Clothing for Those in Need1</a></h4>
            <ul>
              <li>The gift of goodness from a moment is an entity, a home, and a protection for everyone in need.. Children and their happiness are always our priorities. That is why our division number 3490 is the association’s advertisement number.. Their goal is to clothe every child in need and we will make them happy with new clothes.</li>
            </ul>
            <div class="main-button">
              <a href="donations.php">Donate</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="#"><img src="assets/images/pharma.jpg" alt=""></a>
            <span class="category">Medical Support</span>
            <h6>400 EGP</h6>
            <h4><a href="#">Sponsoring Treatment or Donating Medications </a></h4>
            <ul>
              <li>Sponsor a patient with monthly treatment or donate your extra medications for diabetes, kidney failure, cancer, heart disease and rheumatoid arthritis. Help us relieve all the pain they experience. With you and with you, we will not leave a deserving patient without treatment🙏💚></li>
              
            </ul>
            <div class="main-button">
              <a href="donations.php">Donate</a>
            </div>
          </div>
        </div>
       
     
      </div>
    </div>
  </div>

  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contact Us</h6>
            <h2>Get In Touch With Our Charity</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <video width="100%" height="500px" controls>
              <source src="assets/images/ramadan.mp4" type="video/mp4">
             
          </video>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>1116208855<br><span></span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>nubaelkhair2015@gmail.com<br><span></span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form id="contact-form" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-8">
         
        
      <a rel="nofollow"  target="_blank"></a></p>
      
      </div>
    </div>
  </footer>


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>