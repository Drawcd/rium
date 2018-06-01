<div class="list-style-none section-group aboutmap">
  <!-- section-title start -->
  <div class="section-title text-center">
    <h1 class="animate" data-animate="fadeIn" data-duration="1.0s" data-delay="0.1s" data-offset="60">찾아오시는길</h1>
    <h5 class="animate" data-animate="fadeIn" data-duration="1.0s" data-delay="0.1s" data-offset="60">aboutmap</h5>
    <div class="section-title-subtext animate" data-animate="fadeIn" data-duration="1.0s" data-delay="0.1s" data-offset="60">
      <h3><span>고객감동</span>을 목표로 하는 조직</h3>
      <h4><span>고객과</span>의 <span>약속</span>을 소중히 지키기 위해 <span>리움</span>의 구성원들은</h4>
      <h4>언제나 자신의 자리에서 최선을 다하고 있습니다.</h4>
    </div>
  </div>
  <!-- section-title End -->
  <div class="aboutmap-wrap animate" data-animate="fadeIn" data-duration="1.0s" data-delay="0.1s" data-offset="60">
    <div class="aboutmap-list section-group" >
      <div class="aboutmap-item">
        <div class="aboutmap-item-wrap text-center">
          <h3>지도확대축소</h3>
          <div class="aboutmap-item-button switch-on">
            <div class="aboutmap-item-button-switch"></div>
          </div>
        </div>
      </div>
      <div class="aboutmap-item aboutmap-item-button-bg"></div>

      <!-- 다음지도 시작 -->
      <div id="map" style="width:100%;height:550px;"></div>

      <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=c32e30749f5bf06bb7e7bc550ff43092&libraries=services"></script>
      <script>
      // $('.aboutmap-item-button.switch-off').on("click", function(){
      //   $('.aboutmap-item-button').addClass("switch-on");
      //   $('.aboutmap-item-button').removeClass("switch-off");
      //   $('.aboutmap-item-button-bg').fadeOut();
      // });
      // $('.aboutmap-item-button.switch-on').on("click", function(){
      //   $('.aboutmap-item-button').addClass("switch-off");
      //   $('.aboutmap-item-button').removClass("switch-on");
      //   $('.aboutmap-item-button-bg').fadeIn();
      // });

      $('.aboutmap-item-button').data({
        'switch-on': false
      }).on('click', function() {
        if ($(this).data('switch-on') == false) {
          $(this).addClass("switch-off");
          $('.aboutmap-item-button-bg').fadeOut();
          $(this).data({
            'switch-on': true
          });
        } else {
          $(this).removeClass("switch-off");
          $('.aboutmap-item-button-bg').fadeIn();
          $(this).data({
            'switch-on': false
          });
        }
      });




      var mapContainer = document.getElementById('map'), // 지도를 표시할 div
          mapOption = {
              center: new daum.maps.LatLng(466436.0, 1172906.0), // 지도의 중심좌표
              level: 3 // 지도의 확대 레벨
          };

      // 지도를 생성합니다
      var map = new daum.maps.Map(mapContainer, mapOption);

      // 주소-좌표 변환 객체를 생성합니다
      var geocoder = new daum.maps.services.Geocoder();

      // 주소로 좌표를 검색합니다
      geocoder.addressSearch('경기도 덕양구 내유동 586-1', function(result, status) {

          // 정상적으로 검색이 완료됐으면
           if (status === daum.maps.services.Status.OK) {

              var coords = new daum.maps.LatLng(result[0].y, result[0].x);

              // 결과값으로 받은 위치를 마커로 표시합니다
              var marker = new daum.maps.Marker({
                  map: map,
                  position: coords
              });

              // 인포윈도우로 장소에 대한 설명을 표시합니다
              var infowindow = new daum.maps.InfoWindow({
                  content: '<div style="width:150px;text-align:center;padding:6px 0;">더케이종합건설</div>'
              });
              infowindow.open(map, marker);

              // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
              map.setCenter(coords);
          }
      });
      </script>
      <!-- 다음지도 끝 -->
    </div>
  </div>
</div>
