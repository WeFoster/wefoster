<?php if ( ! class_exists( 'BuddyPress' )): ?>

  <div class="row wf-admin-box wf-no-buddypress">
    <div class="col-sm-3">
      <div class="media-container">
<img src="https://cdn.wefoster.co/dashboard/bp-logo.png" alt="">
      </div>
    </div>
    <div class="col-sm-9">
      <h3>It seems BuddyPress is not installed </h3>
      <p>The WeFoster Theme can be use as a regular WordPress theme without a problem, but it was developed from the ground up with BuddyPress in mind! We recommend that you install and activate BuddyPress first to unlock all of the powerful features that come with it!</p>
      <p>
        <?php
        $plugin_name = 'BuddyPress';
        $install_link = '<a href="' . esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $plugin_name . '&TB_iframe=true&width=900&height=600' ) ) . '" class="thickbox"><span class="dashicons dashicons-admin-plugins"></span> Install ' . $plugin_name . ' Now</a>';
         ?>
        <?php echo $install_link; ?>
      </p>
    </div>
  </div>

<?php endif; ?>



<div class="row wf-admin-box">
  <div class="col-sm-3">
    <div class="media-container">
      <svg class="box-brand-secondary" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 60 60" height="60px" width="60px">
          <!-- Generator: Sketch 3.2.2 (9983) - http://www.bohemiancoding.com/sketch -->
          <g sketch:type="MSPage" fill-rule="evenodd" fill="none" stroke-width="1" stroke="none" id="stroked">
              <g stroke-width="2" stroke="#535353" stroke-linecap="round" transform="translate(2.000000, -849.000000)" sketch:type="MSLayerGroup" id="Tech">
                  <g sketch:type="MSShapeGroup" transform="translate(0.000000, 856.000000)" id="Browsersettings">
                      <rect height="38" width="56" y="8" x="0" id="Rectangle-435"/>
                      <rect height="8" width="56" y="0" x="0" id="Rectangle-436"/>
                      <circle r="1" cy="4" cx="4" id="Oval-475"/>
                      <circle r="1" cy="4" cx="9" id="Oval-476"/>
                      <circle r="1" cy="4" cx="14" id="Oval-477"/>
                      <path transform="translate(28.000000, 27.000000) rotate(-45.000000) translate(-28.000000, -27.000000) " stroke-linejoin="round" id="Rectangle-355" d="M23.3336479,34.0596366 L22.6133177,34.7799668 C21.9534202,35.4398642 20.8873203,35.4436694 20.2218254,34.7781746 C19.5609381,34.1172873 19.5606679,33.0460476 20.2200332,32.3866823 L20.9403634,31.6663521 C20.3521353,30.7782197 19.9270176,29.772634 19.707723,28.6923077 L18.6897732,28.6923077 C17.7565372,28.6923077 17,27.9411518 17,27 C17,26.0653643 17.7572898,25.3076923 18.6897732,25.3076923 L19.707723,25.3076923 C19.9270176,24.227366 20.3521353,23.2217803 20.9403634,22.3336479 L20.2200332,21.6133177 C19.5601358,20.9534202 19.5563306,19.8873203 20.2218254,19.2218254 C20.8827127,18.5609381 21.9539524,18.5606679 22.6133177,19.2200332 L23.3336479,19.9403634 C24.2217803,19.3521353 25.227366,18.9270176 26.3076923,18.707723 L26.3076923,17.6897732 C26.3076923,16.7565372 27.0588482,16 28,16 C28.9346357,16 29.6923077,16.7572898 29.6923077,17.6897732 L29.6923077,18.707723 C30.772634,18.9270176 31.7782197,19.3521353 32.6663521,19.9403634 L33.3866823,19.2200332 C34.0465798,18.5601358 35.1126797,18.5563306 35.7781746,19.2218254 C36.4390619,19.8827127 36.4393321,20.9539524 35.7799668,21.6133177 L35.0596366,22.3336479 C35.6478647,23.2217803 36.0729824,24.227366 36.292277,25.3076923 L37.3102268,25.3076923 C38.2434628,25.3076923 39,26.0588482 39,27 C39,27.9346357 38.2427102,28.6923077 37.3102268,28.6923077 L36.292277,28.6923077 C36.0729824,29.772634 35.6478647,30.7782197 35.0596366,31.6663521 L35.7799668,32.3866823 C36.4398642,33.0465798 36.4436694,34.1126797 35.7781746,34.7781746 C35.1172873,35.4390619 34.0460476,35.4393321 33.3866823,34.7799668 L32.6663521,34.0596366 C31.7782197,34.6478647 30.772634,35.0729824 29.6923077,35.292277 L29.6923077,36.3102268 C29.6923077,37.2434628 28.9411518,38 28,38 C27.0653643,38 26.3076923,37.2427102 26.3076923,36.3102268 L26.3076923,35.292277 C25.227366,35.0729824 24.2217803,34.6478647 23.3336479,34.0596366 L23.3336479,34.0596366 Z M28,29.5384615 C29.4019536,29.5384615 30.5384615,28.4019536 30.5384615,27 C30.5384615,25.5980464 29.4019536,24.4615385 28,24.4615385 C26.5980464,24.4615385 25.4615385,25.5980464 25.4615385,27 C25.4615385,28.4019536 26.5980464,29.5384615 28,29.5384615 Z"/>
                  </g>
              </g>
          </g>
      </svg>
    </div>
  </div>
  <div class="col-sm-9">
    <h3><span>Step 1 -</span> Set up your theme!</h3>
    <p>The WeFoster Theme automatically sets up some default widgets and your homepage so you can hit the ground running. We have written an extensive getting started guide that walks you through setting up your community in a snap. Everything from setting up Menus, using the 70+ Customiser options and much more!</p>
    <p><a href="https://documentation.wefoster.co/kb/wefoster-theme-documentation/" target="_blank">Read our Documentation</a></p>
  </div>
</div>

<div class="row wf-admin-box">
  <div class="col-sm-3">
    <div class="media-container">
      <svg class="box-brand-primary" width="60px" height="60px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
          <g id="stroked" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
              <g id="Kitchen" sketch:type="MSLayerGroup" transform="translate(-847.000000, -1198.000000)" stroke="#535353" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <g id="Leaf" transform="translate(877.646447, 1229.353553) rotate(-315.000000) translate(-877.646447, -1229.353553) translate(860.646447, 1200.853553)" sketch:type="MSShapeGroup">
                      <path d="M17,48.9606674 C26.756124,45.1137087 33.6597323,35.6032333 33.6597323,24.4803337 C33.6597323,13.3574342 26.756124,3.84695871 17,4.54747351e-13 C7.24387598,3.84695871 0.340267672,13.3574342 0.340267672,24.4803337 C0.340267672,35.6032333 7.24387598,45.1137087 17,48.9606674 L17,48.9606674 Z" id="Oval-750"></path>
                      <path d="M17.2451028,48.9606674 C17.2451028,48.9606674 14.5452095,53.9440619 19.4242084,56" id="Path-1732"></path>
                      <path d="M16.9907716,4.52036677 C16.9907716,4.52036677 13.7876856,22.1435911 17.0300587,44.4937602" id="Path-1733"></path>
                      <path d="M16.5972184,35.8592796 L24.988568,32.0402154" id="Line"></path>
                      <path d="M16.5859278,25.8553585 L23.9998586,22.2451465" id="Line"></path>
                      <path d="M16.2825106,16.5386134 L21.3032758,14.591329" id="Line"></path>
                      <path d="M15.5857865,16.6862914 L10.636039,14.5649712" id="Line"></path>
                      <path d="M16.2928932,25.8786796 L9.22182541,23.0502525" id="Line"></path>
                      <path d="M16.2928932,35.7781745 L9.22182541,32.9497475" id="Line"></path>
                  </g>
              </g>
          </g>
      </svg>
    </div>
  </div>
  <div class="col-sm-9">
    <h3><span>Step 2 -</span> Join the WeFoster Community</h3>
    <p>Launching a succesfull social network ain't easy, but we're here to help! Join our community of BuddyPress developers and site owners to learn everything there is to know about building succesful communities! By creating your profile you can connect to other site owners with similar goals..  </p>
    <p><a target="_blank" href="https://wefoster.co/create-your-account/">Create Your WeFoster Account</a></p>
  </div>
</div>

<div class="row wf-admin-box">
  <div class="col-sm-3">
    <div class="media-container">
      <svg class="box-brand-secondary" width="60px" height="60px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
          <!-- Generator: Sketch 3.2.2 (9983) - http://www.bohemiancoding.com/sketch -->
          <g id="stroked" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
              <g id="Activities" sketch:type="MSLayerGroup" transform="translate(-254.000000, -1198.000000)" stroke="#535353" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <g id="Ecology" transform="translate(256.000000, 1200.000000)" sketch:type="MSShapeGroup">
                      <path d="M4.29681794,41.8561276 C5.44254062,43.0885231 17.1888283,51.1785593 17.5362043,51.8728543 C17.8835802,52.5671494 20.8521687,57.4846084 24.1939738,55.4165907 C27.535779,53.3485729 25.4920016,43.5964366 24.842988,42.7262823 C24.1939745,41.856128 15.5418234,34.0812212 15.5418234,34.0812212 C15.5418234,34.0812212 13.6908298,33.7150932 12.9620035,34.6172639 C12.2331772,35.5194347 12.7388048,36.8538244 12.7388048,36.8538244 L16.8922212,41.5997693 L8.87422033,37.9238517 L4.11706982,25.7693573 C4.11706982,25.7693573 3.27916002,24.6972719 1.66943104,25.2333146 C0.059702072,25.7693573 0.679444283,27.8222821 0.679444283,27.8222821 C0.679444283,27.8222821 3.15109526,40.6237321 4.29681794,41.8561276 Z" id="Path-2186"></path>
                      <path d="M34.2968179,41.8561276 C35.4425406,43.0885231 47.1888283,51.1785593 47.5362043,51.8728543 C47.8835802,52.5671494 50.8521687,57.4846084 54.1939738,55.4165907 C57.535779,53.3485729 55.4920016,43.5964366 54.842988,42.7262823 C54.1939745,41.856128 45.5418234,34.0812212 45.5418234,34.0812212 C45.5418234,34.0812212 43.6908298,33.7150932 42.9620035,34.6172639 C42.2331772,35.5194347 42.7388048,36.8538244 42.7388048,36.8538244 L46.8922212,41.5997693 L38.8742203,37.9238517 L34.1170698,25.7693573 C34.1170698,25.7693573 33.27916,24.6972719 31.669431,25.2333146 C30.0597021,25.7693573 30.6794443,27.8222821 30.6794443,27.8222821 C30.6794443,27.8222821 33.1510953,40.6237321 34.2968179,41.8561276 Z" id="Path-2187" transform="translate(43.309579, 40.501986) scale(-1, 1) translate(-43.309579, -40.501986) "></path>
                      <path d="M38.960643,32.9940539 C44.7706122,30.3555874 48.8110297,24.5025649 48.8110297,17.7058523 C48.8110297,10.9091398 44.7706122,5.0561173 38.960643,2.4176508 C33.1506739,5.0561173 29.1102564,10.9091398 29.1102564,17.7058523 C29.1102564,24.5025649 33.1506739,30.3555874 38.960643,32.9940539 L38.960643,32.9940539 Z" id="Oval-929" transform="translate(38.960643, 17.705852) rotate(46.000000) translate(-38.960643, -17.705852) "></path>
                      <path d="M16.1599346,20.67359 C19.4013408,19.2015784 21.6555067,15.9361526 21.6555067,12.1442381 C21.6555067,8.35232361 19.4013408,5.08689777 16.1599346,3.61488622 C12.9185284,5.08689777 10.6643625,8.35232361 10.6643625,12.1442381 C10.6643625,15.9361526 12.9185284,19.2015784 16.1599346,20.67359 L16.1599346,20.67359 Z" id="Oval-929" transform="translate(16.159935, 12.144238) rotate(-34.000000) translate(-16.159935, -12.144238) "></path>
                      <path d="M24.7136327,33.7205043 C24.7136327,33.7205043 30.0180594,22.6820363 37.6576017,17.6355259" id="Path-2189"></path>
                      <path d="M22.4071919,24.3915057 C22.4071919,24.3915057 21.0852098,17.2519472 17.8157576,13.4893228" id="Path-2191"></path>
                  </g>
              </g>
          </g>
      </svg>
    </div>
  </div>
  <div class="col-sm-9">
    <h3><span>Step 3 -</span> Foster Your Community</h3>
    <p>Whether you are still in the planning stages or are already a BuddyPress & WordPress expert, we've got plenty of resources on how to build better communities for your audience. Simply follow the links below and you'll be an expert in no-time!</p>
    <p>
        <ul class="nav nav-pills">
        <li role="presentation"><a href="https://wefoster.co/buddypress-news/"><i class="fa fa-newspaper-o"></i> Newsfeed</a></li>
        <li target="_blank" role="presentation"><a href="https://wefoster.co/community-questions/"><i class="fa fa-comments"></i> Question & Answers</a></li>
        <li target="_blank" role="presentation"><a href="https://wefoster.co/buddypress-communities/"><i class="fa fa-users"></i> Communities</a></li>
        <li role="presentation"><a href="https://wefoster.co/blog/"><i class="fa fa-book"></i> Articles</a></li>
        </ul>
    </p>
  </div>
</div>

<div class="row wf-admin-box">
  <div class="col-sm-3">
    <div class="media-container">
      <svg class="box-brand-primary" width="60px" height="60px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
          <!-- Generator: Sketch 3.2.2 (9983) - http://www.bohemiancoding.com/sketch -->
          <g id="stroked" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
              <g id="Tech" sketch:type="MSLayerGroup" transform="translate(-238.000000, -9.000000)" stroke="#535353" stroke-width="2">
                  <g id="Connexions" transform="translate(240.000000, 12.000000)" sketch:type="MSShapeGroup">
                      <circle id="Oval-377" cx="27" cy="27" r="5"></circle>
                      <g id="Group" transform="translate(8.000000, 0.000000)">
                          <path d="M19,21.5 L19,6" id="Line" stroke-linecap="square"></path>
                          <path d="M19,32.5 L19,48" id="Line" stroke-linecap="square"></path>
                          <circle id="Oval-378" cx="19" cy="3" r="3"></circle>
                          <circle id="Oval-378" transform="translate(19.000000, 52.000000) rotate(-180.000000) translate(-19.000000, -52.000000) " cx="19" cy="52" r="3"></circle>
                          <g transform="translate(1.000000, 9.000000)">
                              <circle id="Oval-378" cx="35" cy="2" r="2"></circle>
                              <ellipse id="Oval-378" cx="2" cy="35" rx="2" ry="2"></ellipse>
                              <path d="M22.5,14.5 L33.011898,3.98810196" id="Line" stroke-linecap="square"></path>
                              <path d="M3.5,33.5 L14.011898,22.988102" id="Line" stroke-linecap="square"></path>
                          </g>
                          <g id="Group-5" transform="translate(19.000000, 27.500000) rotate(-90.000000) translate(-19.000000, -27.500000) translate(0.500000, 8.500000)">
                              <circle id="Oval-378" cx="35" cy="3" r="2"></circle>
                              <ellipse id="Oval-378" cx="2" cy="36" rx="2" ry="2"></ellipse>
                              <path d="M22.5,15.5 L33.011898,4.98810196" id="Line" stroke-linecap="square"></path>
                              <path d="M3.5,34.5 L15,23" id="Line" stroke-linecap="square"></path>
                          </g>
                      </g>
                      <g id="Group-4" transform="translate(27.500000, 26.500000) rotate(-90.000000) translate(-27.500000, -26.500000) translate(24.000000, -1.000000)">
                          <path d="M3,21.5 L3,6" id="Line" stroke-linecap="square"></path>
                          <path d="M3,32.5 L3,48" id="Line" stroke-linecap="square"></path>
                          <circle id="Oval-378" cx="3" cy="3" r="3"></circle>
                          <circle id="Oval-378" transform="translate(3.000000, 52.000000) rotate(-180.000000) translate(-3.000000, -52.000000) " cx="3" cy="52" r="3"></circle>
                      </g>
                  </g>
              </g>
          </g>
      </svg>
    </div>
  </div>
  <div class="col-sm-9">
    <h3><span>Step 4 -</span> Take it the the next level </h3>
    <p>With great power comes great responsibility; there are countless options and decisions you have to make whilst building your community. What plugins should I use? How do I grow my community? Where do I find a custom developer? The links below will help you answer those questions</p>
    <p>
      <ul class="nav nav-pills">
      <li role="presentation"><a href="https://wefoster.co/buddypress-developer/"><i class="fa fa-code"></i> Finding a BuddyPress Developer</a></li>
      <li target="_blank" role="presentation"><a href="http://development.wefoster.co/buddypress-plugins/"><i class="fa fa-list-alt"></i> BuddyPress Plugin Repository</a></li>
      <li target="_blank" role="presentation"><a href="https://wefoster.co/community/community-building/"></i> <i class="fa fa-leaf"></i> Community Building</a></li>
      </ul>
    </p>
  </div>
</div>

<div class="wf-admin-box wf-congrats">
<p>
  You're all set to build an amazing community! Congratulations and see on you on <a href="https://wefoster.co">WeFoster.co!</a>
</p>
</div>
