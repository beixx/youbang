;(function(window) {

var svgSprite = '<svg>' +
  ''+
    '<symbol id="icon-tubiao" viewBox="0 0 1024 1024">'+
      ''+
      '<path d="M880.09984 369.06496c-35.55968-9.33376-119.17952-9.22368-241.472-12.44544 5.77792-26.69696 7.11296-50.75584 7.11296-93.48352 0-102.0672-74.3424-191.968-140.14336-191.968-46.4512 0-84.76032 37.97632-85.34528 84.67712-0.63872 57.28384-18.33472 156.24064-113.79072 206.41408-7.00032 3.69408-27.03104 13.55648-29.94688 14.86336l1.49888 1.27744c-14.94656-12.8896-35.6416-22.752-56.89472-22.752l-85.34272 0c-47.06176 0-85.344 38.28224-85.344 85.34272l0 455.16416c0 47.06048 38.28224 85.34272 85.344 85.34272l85.34272 0c33.86496 0 62.17216-20.44544 75.8976-49.11488 0.3328 0.11008 0.94464 0.27776 1.33248 0.3328 1.88928 0.50048 4.08448 1.05728 6.80704 1.77792 0.50048 0.11264 0.77824 0.17024 1.3056 0.33536 16.3904 4.05504 47.9232 11.61216 115.3472 27.11296 14.47424 3.28064 90.8032 19.55712 169.92384 19.55712l155.52 0c47.392 0 81.56288-18.22208 101.89952-54.83776 0.27776-0.55552 6.83264-13.3376 12.16768-30.6176 4-12.99712 5.50272-31.38944 0.66688-50.05952 30.55744-21.00224 40.39296-52.7296 46.78528-73.38496 10.72256-33.89312 7.49952-59.33696 0.05504-77.56288 17.16736-16.22528 31.83488-40.94976 38.00192-78.67776 3.83232-23.392-0.27776-47.4496-11.05536-67.49312 16.11264-18.08768 23.44448-40.8384 24.27776-61.89568l0.33536-5.9456c0.22272-3.7504 0.3904-6.05568 0.3904-14.25024C960.77696 430.82368 935.8848 385.01248 880.09984 369.06496zM249.56672 896.15488c0 15.7248-12.7232 28.448-28.448 28.448l-85.34272 0c-15.7248 0-28.448-12.72192-28.448-28.448L107.328 440.99072c0-15.72352 12.7232-28.448 28.448-28.448l85.34272 0c15.72352 0 28.448 12.7232 28.448 28.448L249.56672 896.15488zM903.21536 484.66304c-0.55808 14.05696-6.4448 41.66912-56.22784 41.66912-42.6752 0-56.89984 0-56.89984 0-7.88736 0-14.22208 6.36288-14.22208 14.22464s6.33472 14.22464 14.22208 14.22464c0 0 12.448 0 55.11808 0 42.6752 0 48.28544 35.4048 45.50784 52.46208-3.49952 21.22496-13.44768 61.34272-61.50528 61.34272-48.00768 0-67.56736 0-67.56736 0-7.88736 0-14.22208 6.33472-14.22208 14.22208 0 7.83744 6.33472 14.22464 14.22208 14.22464 0 0 33.78304 0 56.00768 0 48.00768 0 43.78496 36.6144 36.89472 58.45248-9.05728 28.7104-14.61504 55.32544-75.12192 55.32544-20.44544 0-46.39232 0-46.39232 0-7.88992 0-14.22208 6.33472-14.22208 14.22464 0 7.83232 6.33216 14.22208 14.22208 14.22208 0 0 19.7248 0 44.6144 0 31.11552 0 32.56064 29.44768 29.3376 40.00512-3.55712 11.55712-7.77728 20.11264-7.94496 20.50304-8.61056 15.50208-22.4448 24.83456-51.7824 24.83456l-155.52 0c-78.11968 0-155.61728-17.72288-157.61536-18.16704-118.18112-27.22688-124.4032-29.3376-131.82208-31.44704 0 0-24.06016-4.0576-24.06016-25.05984l-0.22144-392.90624c0-13.33504 8.50304-25.39136 22.5856-29.64224 1.74976-0.69504 4.13952-1.41696 5.8624-2.13888 129.95968-53.81248 169.52064-171.8272 170.68928-268.72704 0.1664-13.6128 10.66752-28.448 28.44672-28.448 30.0736 0 83.24864 60.36864 83.24864 135.072 0 67.45216-2.72256 79.12064-26.33728 149.40672 284.48 0 282.47808 4.0832 307.59296 10.66752 31.11552 8.8896 33.78304 34.67136 33.78304 43.56224C903.88224 476.52224 903.60192 475.10656 903.21536 484.66304z"  ></path>'+
      ''+
      '<path d="M178.44608 810.81216c-23.55712 0-42.67008 19.11296-42.67008 42.67264 0 23.55712 19.11296 42.67008 42.67008 42.67008 23.56096 0 42.67264-19.11296 42.67264-42.67008C221.11872 829.92512 202.00576 810.81216 178.44608 810.81216zM178.44608 867.70688c-7.8336 0-14.22208-6.38976-14.22208-14.22208 0-7.83488 6.38976-14.22464 14.22208-14.22464 7.83616 0 14.22464 6.38976 14.22464 14.22464C192.67072 861.31712 186.28224 867.70688 178.44608 867.70688z"  ></path>'+
      ''+
    '</symbol>'+
  ''+
    '<symbol id="icon-siliao" viewBox="0 0 1024 1024">'+
      ''+
      '<path d="M1010.68167 511.575328c0-251.231905-224.028333-452.858018-498.143411-452.858018S14.394848 260.343423 14.394848 511.575328s224.028333 452.858018 498.143411 452.858018c17.573237 0 17.573237 0 54.06229 0 42.794665 0 42.794665 0 91.895967 0 6.835685 0 6.835685 0 13.653975 0 102.636588 0 102.636588 0 135.509277 0l58.71117 0-14.910595-56.786331c-0.938372-3.574409-2.493797-10.287297-4.063549-18.664082-1.609661-8.590656-2.821255-16.914228-3.472078-24.423249-0.497327-5.730515-0.629333-10.666944-0.448208-14.44192C948.768575 765.03497 1010.68167 643.029242 1010.68167 511.575328zM807.658743 919.14693c0 0-262.984576 0-295.121508 0-250.106268 0-452.858018-182.475961-452.858018-407.571602S262.430968 104.003725 512.538259 104.003725s452.858018 182.475961 452.858018 407.571602c0 123.629715-61.160965 234.402611-157.736511 309.147966C786.18057 837.346903 807.658743 919.14693 807.658743 919.14693z"  ></path>'+
      ''+
      '<path d="M245.192352 501.8355A53.183 53.772 0 1 1 245.192352 502.858806Z"  ></path>'+
      ''+
      '<path d="M471.621361 501.8355A53.183 53.772 0 1 1 471.621361 502.858806Z"  ></path>'+
      ''+
      '<path d="M675.407674 501.8355A53.183 53.772 0 1 1 675.407674 502.858806Z"  ></path>'+
      ''+
    '</symbol>'+
  ''+
    '<symbol id="icon-tianjiahaoyou" viewBox="0 0 1024 1024">'+
      ''+
      '<path d="M831.36 724.512l-200.768 0c-13.248 0-24-10.752-24-24s10.752-24 24-24l200.768 0c13.248 0 24 10.752 24 24S844.608 724.512 831.36 724.512z"  ></path>'+
      ''+
      '<path d="M730.976 824.864c-13.248 0-24-10.752-24-24l0-200.768c0-13.248 10.752-24 24-24s24 10.752 24 24l0 200.768C754.976 814.144 744.224 824.864 730.976 824.864z"  ></path>'+
      ''+
      '<path d="M487.168 885.92c-88.608-0.096-245.216-10.688-299.296-80.768-18.176-23.584-23.584-52.16-15.616-82.592 17.28-65.984 95.424-111.68 215.776-126.976l0-13.728c-38.272-30.24-67.872-80.672-82.048-140.608-7.168-30.08-17.92-111.2-5.344-169.824C318.112 189.76 369.312 144 448.704 139.072c19.104-1.152 56.992-1.376 77.12 0 79.36 5.728 130.464 51.488 147.776 132.32 12.544 58.528 1.856 139.68-5.312 169.824-14.208 59.968-43.808 110.4-82.08 140.608l0 35.232c0 13.248-10.752 24-24 24s-24-10.752-24-24l0-47.424c0-8.032 4.032-15.52 10.72-20 32.928-21.856 60.096-66.528 72.672-119.456 7.808-32.992 14.848-103.072 5.056-148.672-12.896-60.256-46.016-90.304-104.288-94.496-17.568-1.248-53.568-1.056-70.752 0-57.152 3.52-91.232 34.432-104.064 94.496-9.792 45.696-2.752 115.744 5.088 148.672 12.576 52.928 39.712 97.6 72.672 119.456 6.688 4.48 10.72 11.968 10.72 20l0 47.424c0 12.416-9.44 22.752-21.792 23.904-108.128 10.016-183.072 45.984-195.552 93.728-4.256 16.192-1.984 29.248 7.2 41.12 29.92 38.752 127.552 61.984 261.28 62.08 63.936-0.064 121.568-5.6 166.56-16 12.672-3.136 25.792 5.024 28.768 17.984 3.008 12.896-5.056 25.824-17.984 28.768C616.064 879.872 554.72 885.856 487.168 885.92z"  ></path>'+
      ''+
    '</symbol>'+
  ''+
'</svg>'
var script = function() {
    var scripts = document.getElementsByTagName('script')
    return scripts[scripts.length - 1]
  }()
var shouldInjectCss = script.getAttribute("data-injectcss")

/**
 * document ready
 */
var ready = function(fn){
  if(document.addEventListener){
      document.addEventListener("DOMContentLoaded",function(){
          document.removeEventListener("DOMContentLoaded",arguments.callee,false)
          fn()
      },false)
  }else if(document.attachEvent){
     IEContentLoaded (window, fn)
  }

  function IEContentLoaded (w, fn) {
      var d = w.document, done = false,
      // only fire once
      init = function () {
          if (!done) {
              done = true
              fn()
          }
      }
      // polling for no errors
      ;(function () {
          try {
              // throws errors until after ondocumentready
              d.documentElement.doScroll('left')
          } catch (e) {
              setTimeout(arguments.callee, 50)
              return
          }
          // no errors, fire

          init()
      })()
      // trying to always fire before onload
      d.onreadystatechange = function() {
          if (d.readyState == 'complete') {
              d.onreadystatechange = null
              init()
          }
      }
  }
}

/**
 * Insert el before target
 *
 * @param {Element} el
 * @param {Element} target
 */

var before = function (el, target) {
  target.parentNode.insertBefore(el, target)
}

/**
 * Prepend el to target
 *
 * @param {Element} el
 * @param {Element} target
 */

var prepend = function (el, target) {
  if (target.firstChild) {
    before(el, target.firstChild)
  } else {
    target.appendChild(el)
  }
}

function appendSvg(){
  var div,svg

  div = document.createElement('div')
  div.innerHTML = svgSprite
  svg = div.getElementsByTagName('svg')[0]
  if (svg) {
    svg.setAttribute('aria-hidden', 'true')
    svg.style.position = 'absolute'
    svg.style.width = 0
    svg.style.height = 0
    svg.style.overflow = 'hidden'
    prepend(svg,document.body)
  }
}

if(shouldInjectCss && !window.__iconfont__svg__cssinject__){
  window.__iconfont__svg__cssinject__ = true
  try{
    document.write("<style>.svgfont {display: inline-block;width: 1em;height: 1em;fill: currentColor;vertical-align: -0.1em;font-size:16px;}</style>");
  }catch(e){
    console && console.log(e)
  }
}

ready(appendSvg)


})(window)