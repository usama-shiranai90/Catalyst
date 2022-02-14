// import('additionalWork');


window.onload = function (e) {
    let vrowPLOCounter = 5;

    const vCloMappingDivID = document.getElementById('vCloMappingDivID');
    const localStorageViewMapping = getLocalStorage('courseMap_key');
    const localStorageViewDescriptionCLO = getLocalStorage('courseCLO_key');

    console.log(localStorageViewMapping, localStorageViewMapping.length);
    console.log(localStorageViewDescriptionCLO, localStorageViewDescriptionCLO.length);

    fetchingCLOMappingWithDescription(localStorageViewDescriptionCLO.length)

    function fetchingCLOMappingWithDescription(size) {

        for (let i = 0; i < size; i++) {

            let rowData = `<div class="w-full rounded-md shadow-sm">
                                           <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/CLO_white_svg.svg">
                                           <div class="px-4 py-0">
                                               <p class="font-semibold text-xl py-2">${localStorageViewDescriptionCLO[i][1]}</p>
                                               <p class="font-medium text-sm text-gray-700 text-justify">${localStorageViewDescriptionCLO[i][2]}</p>
                                               <div class="flex flex-col my-5 space-y-0">
                                                   <p class="font-semibold text-base">${localStorageViewDescriptionCLO[i][3]}</p>
                                                   <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">${localStorageViewDescriptionCLO[i][4]}</span></p>
                                               </div>
                                           </div>
                                           <div  class="px-4 border-t-4 border-b-4 border-catalystLight-f6_bg hover:border-catalystLight-89">
                                               <div id="clomp-v-${i + 1}" class="flex flex-row flex-wrap my-5 items-center w-full text-center">
                                                  
                                               </div>
                                           </div>
                                       </div>`
            vCloMappingDivID.innerHTML += rowData;

            const cloMap = document.getElementById(`clomp-v-${i + 1}`);
            // console.log('iterate : ', cloMap, "   ", i)
            createPLOof_aTag(cloMap, i);
            // console.log(localStorageViewMapping[i]);
        }
    }

    function createPLOof_aTag(clomap, i) {
        for (let j = 0; j < localStorageViewMapping[i].length; j++) {
            let wah = `<div class="w-1/5 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110
                                hover:text-indigo-700 hover:underline hover:text-base  
                               focus:outline-none focus:ring-gray-300 relative"
                               onmouseover="showTooltip(${((i + 1) + (j + 1) * vrowPLOCounter)})" onfocus="showTooltip(${((i + 1) + (j + 1) * vrowPLOCounter)})" 
                               onmouseout="hideTooltip(${((i + 1) + (j + 1) * vrowPLOCounter)})" >

                    <!-- tool-tip description section. -->
                    <div id="tooltip${((i + 1) + (j + 1) * vrowPLOCounter)}" role="tooltip" class="hidden z-20 w-64 fixed transition duration-150 ease-in-out top-1/2 right-14 ml-8 shadow-lg bg-white p-4 rounded">
                        <p class="text-sm font-bold text-gray-800 pb-1" id="plono-${i + 1}">${localStorageViewMapping[i][j][0]}</p>
                        <p class="text-xs leading-4 text-gray-600 pb-3">${localStorageViewMapping[i][j][1]}</p>
                        <button class="focus:outline-none  focus:text-gray-400 text-xs text-gray-600 underline mr-2 cursor-pointer">Map view</button>  </div>
                    <span class="cprofile-cell-data">${localStorageViewMapping[i][j][0]}</span>
                </div>`
            clomap.innerHTML += wah;

            // let aRow = `<a class="capitalize font-semibold text-base w-full">${(localStorageViewMapping[i][j])}</a>`
            // clomap.innerHTML += aRow;
        }
        vrowPLOCounter++;
    }
}