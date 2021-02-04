// For inline Javascript only
/*eslint-disable */
/*jslint esversion: 6*/
document.documentElement.style.setProperty("--docready", 0);

const fullScrim = document.createElement("div");
fullScrim.id = "fullscrim";
fullScrim.style.cssText = `
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  pointer-events: none;
  background-color: #fff;
  opacity: 1;
  transition: opacity 0.5s ease-in;
`;

const scrimparser = new DOMParser();

var colors = new Array();
colors.push('#E84E1F','#D85E82','#AE54D3','#6F51D7','#253DF3');
var loaderColor = colors[Math.floor(Math.random()*colors.length)];

const loader = scrimparser.parseFromString(`<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
    <rect x="0" y="10" width="4" height="10" fill="`+loaderColor+`" opacity="0.2">
      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
    </rect>
    <rect x="8" y="10" width="4" height="10" fill="`+loaderColor+`"  opacity="0.2">
      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
    </rect>
    <rect x="16" y="10" width="4" height="10" fill="`+loaderColor+`"  opacity="0.2">
      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
    </rect>
  </svg>
`, 'image/svg+xml');

var scrimSVG = loader;


scrimSVG.documentElement.style.cssText = `
  transform: scale(0.25);
  width: 300px;
  height: 300px;
  flex: none;
`;


const loaderDiv = document.createElement("div");
loaderDiv.style.cssText = `
  position: absolute;
  top: calc(50% - 60px);
  left: calc(50% - 60px);
  height: 120px;
  width: 120px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
`;

loaderDiv.appendChild(scrimSVG.documentElement);
fullScrim.appendChild(loaderDiv);

var removeScrim = function() {
  fullScrim.classList.add("hide");
}

window.addEventListener('DOMContentLoaded', (event) => {
  //console.log("DOM loaded");
  document.body.appendChild(fullScrim);
  document.documentElement.style.setProperty("--docready", 1);
  //add timeout to remove scrim after 3 seconds, even if page isn't 100% loaded
  setTimeout(removeScrim, 3000);
  //remove opacity setting from body
  document.body.style.opacity = 1;
});

window.addEventListener("load", event => {
  console.log("load");
  removeScrim();
}, false);
