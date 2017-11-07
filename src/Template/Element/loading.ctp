<div class="loading row middle-xs">
    <div class="mul7">
        <div class="mul7circ m7c1"></div>
        <div class="mul7circ m7c2"></div>
        <div class="mul7circ m7c3"></div>
        <div class="mul7circ m7c4"></div>
        <div class="mul7circ m7c5"></div>
        <div class="mul7circ m7c6"></div>
        <div class="mul7circ m7c7"></div>
        <div class="mul7circ m7c8"></div>
        <div class="mul7circ m7c9"></div>
        <div class="mul7circ m7c10"></div>
        <div class="mul7circ m7c11"></div>
        <div class="mul7circ m7c12"></div>
    </div>
    <div class="overlay"></div>
</div>
<style>
.loading{
    height: 100vh;
    width: 100%;
    position: fixed;
    z-index: 999;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}
.loading .overlay{
    background: rgba(0, 0, 0, 0.8);
}
    .mul7 {
        margin: 0 auto;
    }

    .mul7circ {
      width: 70px;
      height: 70px;
      position: absolute;
    }

    .mul7circ:before {
      content: '';
      display: block;
      margin: 0 auto;
      width: 10px;
      height: 10px;
      /*background-color: #333;*/
      border-radius: 100%;
      -webkit-animation: multiple7Animation 1.2s infinite ease-in-out both;
      animation: multiple7Animation 1.2s infinite ease-in-out both;
    }

    /* Circle Colors */

    /* Rotate circles */
    .m7c1 {
      -webkit-transform: rotate(30deg);
      transform: rotate(30deg);
    }
    .m7c2 {
      -webkit-transform: rotate(60deg);
      transform: rotate(60deg);
    }
    .m7c3 {
      -webkit-transform: rotate(90deg);
      transform: rotate(90deg);
    }
    .m7c4 {
      -webkit-transform: rotate(120deg);
      transform: rotate(120deg);
    }
    .m7c5 {
      -webkit-transform: rotate(150deg);
      transform: rotate(150deg);
    }
    .m7c6 {
      -webkit-transform: rotate(180deg);
      transform: rotate(180deg);
    }
    .m7c7 {
      -webkit-transform: rotate(210deg);
      transform: rotate(210deg);
    }
    .m7c8 {
      -webkit-transform: rotate(240deg);
      transform: rotate(240deg);
    }
    .m7c9 {
      -webkit-transform: rotate(270deg);
      transform: rotate(270deg);
    }
    .m7c10 {
      -webkit-transform: rotate(300deg);
      transform: rotate(300deg);
    }
    .m7c11 {
      -webkit-transform: rotate(330deg);
      transform: rotate(330deg);
    }

    /* Delay the Animation */
    .m7c2:before {
      -webkit-animation-delay: -1.1s;
      animation-delay: -1.1s;
    }
    .m7c3:before {
      -webkit-animation-delay: -1s;
      animation-delay: -1s;
    }
    .m7c4:before {
      -webkit-animation-delay: -0.9s;
      animation-delay: -0.9s;
    }
    .m7c5:before {
      -webkit-animation-delay: -0.8s;
      animation-delay: -0.8s;
    }
    .m7c6:before {
      -webkit-animation-delay: -0.7s;
      animation-delay: -0.7s;
    }
    .m7c7:before {
      -webkit-animation-delay: -0.6s;
      animation-delay: -0.6s;
    }
    .m7c8:before {
      -webkit-animation-delay: -0.5s;
      animation-delay: -0.5s;
    }
    .m7c9:before {
      -webkit-animation-delay: -0.4s;
      animation-delay: -0.4s;
    }
    .m7c10:before {
      -webkit-animation-delay: -0.3s;
      animation-delay: -0.3s;
    }
    .m7c11:before {
      -webkit-animation-delay: -0.2s;
      animation-delay: -0.2s;
    }
    .m7c12:before {
      -webkit-animation-delay: -0.1s;
      animation-delay: -0.1s;
    }

    /* Circles Animation */
    @-webkit-keyframes multiple7Animation {
      0%, 80%, 100% {
         -webkit-transform: scale(0);
         transform: scale(0);
         opacity: 0;
      } 40% {
         -webkit-transform: scale(1);
         transform: scale(1);
         opacity: 1;
      }
    }

    @keyframes multiple7Animation {
      0%, 80%, 100% {
         -webkit-transform: scale(0);
         transform: scale(0);
         opacity: 0;
      } 40% {
         -webkit-transform: scale(1);
         transform: scale(1);
         opacity: 1;
      }
    }
</style>
