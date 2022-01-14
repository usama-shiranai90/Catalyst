// import('additionalWork');
window.onload = function (e) {

    const localStorageViewMapping = getLocalStorage('courseMap_key');
    const localStorageViewDescriptionCLO = getLocalStorage('courseCLO_key');

    const vCloMappingDivID = document.getElementById('vCloMappingDivID');
    fetchingCLOMappingWithDescription(localStorageViewDescriptionCLO.length)

    console.log(localStorageViewMapping)
    console.log(localStorageViewDescriptionCLO)

    function fetchingCLOMappingWithDescription(size) {

        for (let i = 0; i < size; i++) {

            let rowData = `<div class="w-full rounded-md shadow-sm">
                                           <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/CLO_white_svg.svg">
                                           <div class="px-4 py-0">
                                               <p class="font-semibold text-xl py-2">${localStorageViewDescriptionCLO[i][0]}</p>
                                               <p class="font-medium text-sm text-gray-700 text-justify">${localStorageViewDescriptionCLO[i][1]}</p>
                                               <div class="flex flex-col my-5 space-y-0">
                                                   <p class="font-semibold text-base">${localStorageViewDescriptionCLO[i][2]}</p>
                                                   <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">${localStorageViewDescriptionCLO[i][3]}</span></p>
                                               </div>
                                           </div>
                                           <div  class="px-4 border-t-4 border-b-4 border-catalystLight-f6_bg hover:border-catalystLight-89">
                                               <div id="clomp-v-${i+1}" class=" flex flex-row my-5 items-center w-full text-center">
                                                  
                                               </div>
                                           </div>
                                       </div>`
            vCloMappingDivID.innerHTML += rowData;

            const cloMap = document.getElementById(`clomp-v-${i+1}`);
            console.log('iterate : ' ,cloMap)
            createPLOof_aTag(cloMap , i)

        }
    }
    function createPLOof_aTag(clomap , i) {
        const getmyPLO = (text) => {
            return text.substring(6);
        }
        for (let j = 0; j < localStorageViewMapping[i].length; j++) {
            let aRow = `<a class="capitalize font-semibold text-base w-full">${getmyPLO(localStorageViewMapping[i][j])}</a>`
            clomap.innerHTML  += aRow;
            console.log("row data of a : ", aRow  , getmyPLO(localStorageViewMapping[i][j]))
        }
    }

}