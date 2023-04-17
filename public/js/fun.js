$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
var htmlLast = `<a class="cs-button-vm post-collection-vm" style="margin: auto;cursor:pointer;display:block;text-align:center"><b>BẠN XEM TỚI CUỐI</b></a>`,
htmlLoading = '<img src="/images/loading.svg">', timer;

(function($) {
  $(document).ready(function() {


    addItemToWhishlist('/sup/postWishlist');

    console.log('begin');

    loadCart();

    $('body').off('click','.zalo').on('click','.zalo', function(e) {
      ga('send', 'event', 'Liên hệ ', 'Chat', 'Zalo/FB');
      console.log('click Zalo/FB');
    });

    $('body').off('click','.mess').on('click','.mess', function(e) {
      ga('send', 'event', 'Liên hệ ', 'Chat', 'Messenger');
      console.log('click Messenger');
    });


    // btn "NHẬN TƯ VẤN"
    var btnCall = $(".btnOpenPopupTuVan");
    btnCall.click(function () {
      $("#popup").addClass("show");
      $(".popup__close").click(function () {
        $("#popup").removeClass("show");
      });
    });

    $("#popup").on("click", function (event) {
      $(this).removeClass("show");
    });

    $(".popup__content").on("click", function (event) {
      event.stopPropagation();
    });

    // gửi số điện thoại
     $('.btnSubmitPhone').off().click(function(e) {
        e.preventDefault();
        var that = $(this), data = that.data(), ans = that.parent().parent();
        // console.log(data);
        success = function (res) {

          ga('send', 'event', 'Liên hệ ', 'Gửi SĐT - Popup', data.phone,{'nonInteraction': 1});

          if(res.mode == 1){

            if(data.mode =='icon'){
              ans.find('button').after(`
                <p style="font-size:12px">Gửi thành công</p>
                `);
              setTimeout(function() {
                ans.find('button, input').remove();
              },10);

              return;
            }else{
              // $('.popup_body').slideUp(200);
              $('#inputPhoneTuVan').slideUp(100);
              that.slideUp(100);
              $('.popup').find('.popup_heading').slideUp(100);
              $('.popup__content .order-success').slideDown(800).find('.alert-success').html(`<b style="font-size:12px">Chúng tôi sẽ liên hệ trong thời gian sớm nhất</b>`);
              setTimeout(function() {
                $('#popup').removeClass('show');
              },5000);
              // tracking
            }
          }
        },
        error = function (jqXHR, exception) {
          that.prop('disabled', false).removeClass('disabled');

            if(data.mode =='icon'){
              ans.find('.validateError').show();
              ans.find('.inputPhone').val('');

            }else{
              if(jqXHR.status == "422" || jqXHR.status == "500"){
                that.prop('disabled', false).removeClass('disabled');
                $('.popup__content .order-validate-fail').slideDown(300);
                var $ul = $('.popup__content .order-validate-fail').find('ul').html('');

                if(jqXHR.status == "422"){
                  $.each(jqXHR.responseJSON.errors, function(key, values) {
                    $.each(values, function(index, value){
                      $(`#${key}`).addClass('error');
                      $ul.append('<li>'+value+'</li>');
                    });

                  });
                }
              }
            }
        },
        begin = function () {
          that.prop('disabled', true).addClass('disabled');
          $('.validateError').hide();
          $('.alert').hide();
        };


        data.link_send = window.location.href;
        data.phone = ans.find('.inputPhone').val();

        sendDataToServer('/support/senddata',data, that, success, error, begin);
    });


    // $('.btnSubmitPhone').off().click(function(e) {
    //   console.log('begin click btnSubmitPhone');
    //   e.preventDefault();

    //   var that = $(this), url = "/sup/postContact", data = that.data(), parent = that.parent(), ans = that.parent().parent(), opt ={};

    //   that.prop('disabled', true);
    //   data.phone = $('#inputPhoneTuVan').val();
    //   data.type = 2;
    //   // data in form
    //   // var dataF = $('#formUpdateThuocGoc').serializeArray();

    //   opt.begin = function () {
    //     $('.popup').find('.order-success').hide();
    //     $('.popup').find('.order-validate-fail').hide();
    //   };

    //   opt.success = function(res, that, formData){
    //     $('.popup').find('.order-success').show();
    //   };

    //   opt.error = function (jqXHR, exception) {
    //     $('.popup').find('.order-validate-fail').show();
    //   };

    //   opt.complete = function(res, that, formData){
    //     that.prop('disabled', false);
    //   };

    //   if(url){
    //     sendSer(url, data, that, opt);
    //   }

    // });

    

    $('.clearHiddenClass').on('click', function(e) {
      e.preventDefault();
      $('.c-brand__item').attr("style", "");
      $(this).remove();
      lazyLoad();
    });


    // áp mã giảm giá
    $('body').off('click','.btnMaGiamGia').on('click','.btnMaGiamGia', function(e) {
      console.log('mã giảm giá');
      var that = $(this), data = that.data(), parent = that.parent(), opt ={};
      data.code = $('.inputMaGiamGia').val();
      that.prop('disabled', true);
      console.log(data);

      $('.alertMaKhongHopLe').hide();


      if(!data.code ){
        alert('Bạn chưa nhập mã vourcher :(');

        setTimeout(function() {
          that.prop('disabled', false);
        },1000);

        return;
      }

      opt.success = function(res, that, formData){
        console.log(res);
        setTimeout(function() {
          that.prop('disabled', false);
        },2000);

        // mã không hợp lệ
        if(res.mode == 2 ){
          $('.alertMaKhongHopLe').show().css({'color': 'red'}).html(res.html);
        }

        if(res.mode == 1){
          $('.textfinalPrice').html(res.html);
          $('.inputMaGiamGia').prop('disabled', true);
          $('.btnMaGiamGia').hide();

        }


      };


      opt.error = function (jqXHR, exception) {

      };


      sendSer('/checkout/postVourcher', data, that , opt);
    });

    // $('')

    if(typeof page !== 'undefined'){

      // check by checkout
      if(page == 'checkout'){
        clickPlusAndMinus();
      }

      if(page =='payment'){
        // check out
        $('body').off('click','.checkout_customer_submit').on('click','.checkout_customer_submit', function(e) {

          e.preventDefault();
          var opt = {}, formData = new FormData();;

          $('.order-validate-fail').slideUp(500);

          var url ='/checkout', that = $(this), form = $('#formSubmitOrder');

          opt.success = function (res) {

            if(res.mode == 1){

              $('.order-validate-fail, #formSubmitOrder, .info-checkout-qu, .payment-col--total').slideUp(100);
              // $('.order-success').slideDown(200);
              setTimeout(function() {
                window.location.href = "/send_order/complete";
              }, 100);
            }
          };

          opt.begin = function () {
            that.prop('disabled', true).addClass('disabled');
          };

          opt.error = function (jqXHR, exception) {
            console.log('error');

            $('html, body').animate({
                scrollTop: $(".alert-info").offset().top -50
            }, 500);

            setTimeout(function() {
              that.prop('disabled', false).removeClass('disabled');

            },500);

            if(jqXHR.status == "422" || jqXHR.status == "500"){
              $('.order-validate-fail').slideDown(300);
              var $ul = $('.order-validate-fail').find('ul').html('');

              if(jqXHR.status == "422"){
                $.each(jqXHR.responseJSON.errors, function(key, values) {
                  $.each(values, function(index, value){
                    $(`[name="${key}"]`).addClass('error');
                    $ul.append('<li>'+value+'</li>');
                  });

                });
              }
            }
          };

          form.find('.error').removeClass('error');
          form.find('input').each(function(index, element) {
            formData.append($(this).attr("name"), $(this).val());
          });

          // function sendSer(url, formData, that = '', opt = {})

          sendSer(url, formData, that , opt);

        });
      }
      // end payment


    }


    // btn__search_icon
    $('body').off('click','.btn__search_icon').on('click','.btn__search_icon' , function(e) {
      e.preventDefault();
      console.log('click');
      $('#searchFormLK').submit();
    });


    // list loading
    $('body').off('click','.loading__more').on('click','.loading__more', function (e){
      console.log('click');
      e.preventDefault();
      loadingMoreFn($(this), htmlLast);
    });


    $(window).on("load resize scroll",function(e){
      that = $('.loading__scroll.loading__more');

      if(that.length){
        scrollBottom = $(window).scrollTop() + $(window).height();

        if( that.position().top <= (scrollBottom + 100 ) && that.position().top >= ( $(window).scrollTop() - 100) )  {
          loadingMoreFn(that, htmlLast);
        }
      }
    });

    
    // begin load
    var urlObject = null, 
    urlQuery = null,
    search = location.search.substring(1);

    //// begin - open set url
    // if(search){
    //   urlObject = JSON.parse('{"' + search.replace(/&/g, '","').replace(/=/g,'":"') + '"}', function(key, value) { return key===""?value:decodeURIComponent(value) });

    //   // console.log(search);
    //   urlQuery =  getUrlFormObject(urlObject);
    // }
    //// end

    // checkbox

    $('body').on('change', '.checkboxFilter', function(e) {
      $(".js--dropdown--remove").click();
      actionFilter(this);
    });

    $('body').off('click','.pagination-item__page').on('click', '.pagination-item__page', function(e) {

      e.preventDefault();
      $(this).addClass('active').parent().find('.active').removeClass('active');
      $(this).removeClass('pagination-item__page');

      $('html, body').animate({
          scrollTop: $('.main-content').offset().top
      }, 200);


      actionFilter(this);
    });
    
    // click sort
    $('body').on('click', '.order__item', function(e) {
      var that = $(this),
      data = that.data(),
      curItem = $('.order__item_cur'),
      parent = that.parent();
      parent.find(':hidden').fadeIn(50);

      that.fadeOut(50);

      // console.log(that);
      // console.log(curItem);
      // console.log(that.data('order'));

      curItem.html( that.html() ).data('order',that.data('order') );

      $('.c-dropdown-menu').removeClass('open');

      actionFilter(this);

    });


    // begin section lazy
    lazyLoad();
    setTimeout(function(){
      window.addEventListener('scroll',lazyLoad);
      // window.addEventListener('resize',lazyLoad);
      window.addEventListener('load',lazyLoad);
    }, 500);
    // end section lazy
  });


})(window.jQuery);
//### end

function changeUrl(title, url) {
  if (typeof (history.pushState) != "undefined") {
    var obj = { Title: title, Url: url };
    // history.pushState(obj, obj.Title, obj.Url);
    history.replaceState(obj, obj.Title, obj.Url);
  } else {
    console.log("Browser does not support HTML5.");
  }
}

// lazy load init
function lazyLoad() {
  let lazyImages = $('.lazy-image').toArray(), inAdvance = 350;
  lazyImages.forEach( function (image, index) {
    var value = $(image);

    if (value && value.offset().top <=  window.innerHeight + window.pageYOffset + inAdvance && value.offset().top >  window.pageYOffset  - inAdvance ) {

      image.src = image.dataset.src;
      // value.removeClass('lazy-image');
      // image.onload = () => image.classList.add('loaded');

      value.removeClass('lazy-image').removeAttr('style').addClass('loaded').removeData().parent().find('.loading__image').fadeOut(300).delay(300).remove();
      // console.log(value.attr('class'));
      // console.log(index);
      // image.onload = function () {
      //   value.removeClass('lazy-image').removeAttr('style').addClass('loaded').removeData().parent().find('.loading__image').fadeOut(300).delay(300).remove();
      // };

      delete lazyImages[index]; 
      value.off('scroll load');
    }
  });
}


// end ext
function loadingMoreFn(that, htmlLast = '<p class="text-center">Bạn đã xem tới cuối danh sách</p>', successFn)
{
  var data = that.data(), opt = {}, parent = that.parent(), ans = parent.parent(), url = data.r;

  if(!that.hasClass('loading__more')) return;
  that.removeClass('loading__more');

  if(url){
    // that.find('.loading__icon').html(htmlLoading +'<b>Đang tải...</b>');
    that.find('.loading__icon').html(htmlLoading);

    opt.method = 'GET';

    opt.success = function(res, that, formData){
      let source = $('<div>' + res.html + '</div>').hide(), pagemore = source.find('.loading__more'), items = source.find('.loading__item');

      // get total
      // let totalItem = source.find('#totalItem').html();
      // $('.totalItem').html(totalItem);


      items.each(function(index, ele) {
        ans.find('.loading__wapper:last').append(ele);
      });

      setTimeout(function(){
        lazyLoad()
        successFn && successFn() || null;
      },10);

      that.fadeOut(350);
      setTimeout(function(){
        that.remove();
      },450);

      if(pagemore.length){
        // delay loading button
        setTimeout(function(){
          ans.find('.loading__wapper:last').after(pagemore);
        },790);
      }else {
        ans.find('.loading__wapper:last').after(htmlLast);
      }
    };
    // end success


    // send
    sendSer(url, data, that, opt);
  }else {
    that.fadeOut(600);
    setTimeout(function(){
      that.remove();
    },600);
    ans.find('.loading__wapper:last').after(htmlLast);
  }
}

function getUrlFormObject(urlObject, mode = 'domain')
{
  var url = window.location.hostname, 
  port = window.location.port, 
  pathname = window.location.pathname,
  protocol = window.location.protocol,
  urlQuery = '';

  port = (port == 80) ? '' : ':' + port;
  for (var key in urlObject) {
    if (urlQuery != "") {
        urlQuery += "&";
    }

    if(urlObject[key]){
      urlQuery += key + "=" + urlObject[key];

    }
  }
  
  return urlQuery;
  // if(mode == 'domain'){
  //   return protocol + '//'+ url + port + pathname + '?' +  ;
  // }else{
  //   return mode  + '?' +urlQuery;
  // }
}

function actionFilter(obTarget)
{
  urlObject = {}, urlQuery = null;

  var that = $(obTarget),
  parent = that.parent(),
  // closest  = parent.closest('.c-filter_wapper'),
  closest  = $('.c-filter'),

  data= that.data(),
  opt = {},
  dataSend = { sf:0, pp: 30 ,view: 2 };

  console.log(closest);

  // begin
  $('input[type=checkbox]').attr('disabled','true');

  items = closest.find('.checkboxFilter:checkbox:checked');

  $('.loading__wapper').children().slideUp(200);


  // console.log(closest);
  // console.log(items);
  // console.log(page.data('page'));

  // set brandIds
  if (typeof brandIds !== 'undefined') {
    dataSend.brandIds = brandIds;
  }

  if (typeof setList !== 'undefined') {
    dataSend.setList = setList;
  }

  opt.method = 'GET';
  // map params
  // console.log(items.length);

  // add key all checkboxs
  // console.log(items);

  items.each(function(ind, val){

    var ele = $(val), 
    eleData = ele.data();


    if( urlObject.hasOwnProperty( eleData.key ) ){
      console.log(eleData.key);
      urlObject[eleData.key] += ',' + eleData.val;

    }else if( eleData.val ){
      urlObject[eleData.key] = eleData.val;
    }


  });

  console.log(urlObject);

  // order
  var order = $('.order__item_wrapper').find('.order__item_cur').data('order');
  urlObject['order'] = order;

  // page
  var page = data.page ? data.page : 1;
  urlObject['page'] = page;


  // console.log(urlObject);
  // console.log( getUrlFormObject(urlObject) );
  urlQuery =  getUrlFormObject(urlObject);

  linkQuery = '/sup/getProduct?' + urlQuery;

  $('.loading__wapper').html( "Đang tải..." );

  // console.log(urlQuery);

  // query server
  opt.success = function(res, that, formData){
    // console.log(res.html);

    var items, source = '', pagination = '';
    source = $('<div>' + res.html + '</div>');

    items = source.find('.loading__item').hide();
    $('.loading__wapper').html( items );
    items.slideDown(200);

    source.find('input[type=checkbox]').prop('disabled',true);

    slideBar = closest.html( source.find('.c-filter__block') );

    // console.log( source.find('.pagination').html() );
    // console.log( source.find('.pagination').length );
    // source.find('.pagination-item').off('click');


    if( source.find('.pagination').length ){
      $('body').find('.pagination').html( source.find('.pagination').html() );
    }else{
      $('body').find('.pagination').html('');
    }

    $('body').find('.totalItems').html( source.find('.totalItems').first().html() );

    // btn collapse
    $('.js--filter-control').off('click').click(function () {
      $(this).closest('.c-filter__block').toggleClass('collapse');
      $(this).parent().next().slideToggle(600);
    });

    lazyLoad();

    linkUrl = window.location.pathname + '?' + urlQuery;

    if(urlQuery == ''){
      linkUrl = window.location.pathname;
    }
    changeUrl('', linkUrl);
  };

  opt.error = function(jqXHR, exception, that, formData){
    // setTimeout(function () {
    //   $('input[type=checkbox]').prop('disabled',false);
    // },360);
  };

  opt.complete = function(res, that, formData){

    $('.q-dropdown_menu_mobile').removeClass('open');
    setTimeout(function () {
      $('input[type=checkbox]').prop('disabled',false);
    },360);

  }

  if(linkQuery){
    sendSer(linkQuery, dataSend, that, opt);
  }

}



function sendSer(url, formData, that = '', opt = {})
{
  if(opt.debug){console.log(formData); }

  opt.method = opt.method ? opt.method : 'POST';
  opt.begin && opt.begin(that, formData) || null;

  if(! (formData instanceof FormData)){
    delete formData.front; 
  }

  var xhr, object = {
    url: url, data: formData, processData: false, contentType: false, type: opt.method,
    xhr: function () {
      xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function (evt) {
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
            opt.xhr && opt.xhr(percentComplete, that, formData) || null;
          }
      }, false);
      return xhr;
    },
    success: function (data) { opt.success && opt.success(data, that, formData) || null; },
    error: function(jqXHR, exception) {opt.error && opt.error(jqXHR, exception, that, formData) || null; },
    complete: function(data) { opt.complete && opt.complete(data, that, formData) || null; },
  };

  if(! (formData instanceof FormData)){
    delete object.processData; delete object.contentType;
  }
  $.ajax(object);
  return xhr;
}

function sendDataToServer(url, formData, that = '', success = '', error = '',begin = '', done ='', method = 'POST')
{
  begin && begin() || null;

  var object = {
      url: url, data: formData, processData: false, contentType: false,
      type: 'POST', success: function (data) {success && success(data) || null; },
      error: function(jqXHR, exception) {
        error && error(jqXHR, exception) || null;

      },
      done: function(data) {
        console.log('done');
        done && done(data) || null;
      },
  };

  if(! (formData instanceof FormData)){
    delete object.processData;delete object.contentType;
  }

  $.ajax(object);
} 


function trimChar(string, charToRemove) {
    while(string.charAt(0)==charToRemove) {
        string = string.substring(1);
    }

    while(string.charAt(string.length-1)==charToRemove) {
        string = string.substring(0,string.length-1);
    }

    return string;
}

function updateCart(url, data , that)
{
  $.get(url, data, function(res){
    $('.checkout__wapper').html( res.html );
  })
  .done(function() {
    that.prop('disabled', false);

    clickPlusAndMinus();
    loadCart();

  })
  .fail(function() {
    that.prop('disabled', false);
  })
  .always(function() {
    console.log( "finished" );
  });
}


function clickPlusAndMinus()
{
  $('.js--btn-plus').off('click').click(function () {
    var value = parseInt($(this).prev('input').val());

    if(value > 19){
      alert('Số lượng bạn chọn mua quá lớn, vui lòng liên hệ nhân viên hổ trợ.');
      return;
    }

    if (1 < value < 10) {
      $(this).siblings('.js--btn-minus').removeClass('disabled');
      $(this)
        .prev()
        .val(+value + 1);
      if (value + 1 == 10) {
        $(this).addClass('disabled');
      }
    }
  });

  $('.js--btn-minus').off('click').click(function () {
    var value = parseInt($(this).next('input').val());
    if (1 < value - 1 < 10) {
      $(this).siblings('.js--btn-plus').removeClass('disabled');
      $(this)
        .next()
        .val(+value - 1);
      if (parseInt(value) - 1 == 1) {
        $(this).addClass('disabled');
      }
    }
  });
}


function loadCart(){
  console.log('load cart');

  var opt = {};
  opt.method = "GET";

  opt.success = function(res, that, formData){
    let source = res.html;
    $('.cart__items').remove();
    setTimeout(function () {
      $('.cart__wapper').append(source);
    },10);

    // console.log(source.html());
  };

  // sendSer(url, formData, that , opt);
  sendSer('/sup/getCart',{}, {},opt)

}


function addItemToWhishlist(url = '', sf = 'storeFE')
{

  $('body').off('click','.divIconHeart').on('click','.divIconHeart', function(e) {
    console.log('begin click');
    var that = $(this), data = that.data(), parent = that.parent(), ans = that.parent().parent(), opt ={};

    // begin
    // set data
    data.sf = sf;

    opt = {

      method:'POST',

      success: function(res, that, formData){

        if(res.mode == 1){
          that.addClass('active');
        }else if(res.mode ==2){
          that.removeClass('active');

          if(that.data('remove')){
            var closest = that.closest('.loading__item');


            setTimeout(function(){

              closest.slideUp(300);

              // closest.remove();
            },2000)
          }
        }
      },

      error: function(res, that, formData){
        console.log('error');
      },

      begin: function(){
        console.log('begin');
      },
      complete: function(data, that, formData){

      },

    };

    if(url){
      sendSer(url, data, that, opt)
    }

  });
}
