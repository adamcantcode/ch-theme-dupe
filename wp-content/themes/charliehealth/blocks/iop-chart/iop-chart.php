<div id="mainContainer" class="lg:h-[600px] lg:flex grid">
  <div id="acuity" class="relative flex lg:h-full h-sp-8">
    <div class="lg:w-sp-5 w-full lg:bg-[linear-gradient(#fead80,#e2deca_50%,#bdc6fc)] bg-[linear-gradient(to_right,#fead80,#e2deca_50%,#bdc6fc)]"></div>
    <div class="absolute flex justify-between lg:w-[80px] w-full lg:flex-col lg:relative h-sp-8 lg:h-[unset] items-center">
      <h6 class="mb-0 ml-sp-2">High Acuity</h6>
      <h6 class="mb-0 ml-sp-2 mr-sp-2 lg:mr-0">Low Acuity</h6>
    </div>
  </div>
  <div id="mainChart" class="flex flex-col items-center w-full">
    <h3 id="crisis" class="mb-sp-4 lg:mt-0 mt-sp-4">Mental Health Crisis</h3>
    <div class="flex items-center w-full lg:w-[unset] h-full">
      <div id="symptomsDown" class="z-10 flex flex-col items-center gap-sp-4 lg:flex-row">
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="103" viewBox="0 0 38 103" fill="none">
          <path d="M17.2322 101.768C18.2085 102.744 19.7915 102.744 20.7678 101.768L36.6777 85.8579C37.654 84.8816 37.654 83.2986 36.6777 82.3223C35.7014 81.346 34.1184 81.346 33.1421 82.3223L19 96.4645L4.85787 82.3223C3.88155 81.346 2.29864 81.346 1.32233 82.3223C0.346021 83.2986 0.346021 84.8816 1.32233 85.8579L17.2322 101.768ZM16.5 2.98122e-08L16.5 100L21.5 100L21.5 -2.98122e-08L16.5 2.98122e-08Z" fill="#949CF1" />
        </svg>
        <h5 class="text-center text-[10px] lg:text-h5">Improving<br> Symptoms<br> "Step Down"</h5>
      </div>
      <div id="mainGraphic" class="relative lg:w-[600px] w-full lg:h-full h-[280px]">
        <div id="circleGradient" class="absolute h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-[linear-gradient(#fead80,#e2deca_50%,#bdc6fc)] aspect-square rounded-[100%]"></div>
        <div id="circleBlue" class="absolute h-2/3 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-dark-blue aspect-square rounded-[100%]"></div>
        <div id="circleWhite" class="absolute h-1/3 -translate-x-1/2 -translate-y-1/2 bg-white top-1/2 left-1/2 aspect-square rounded-[100%] flex items-center justify-center">
          <h4 id="ch" class="mb-0 leading-none font-heading-serif">Charlie<br> Health</h4>
        </div>
        <div id="inpatient" class="absolute text-center -translate-x-1/2 bg-white rounded-sm p-sp-2 top-sp-8 left-1/2">
          <h5 class="mb-0 lg:text-h5 text-[12px]">Inpatient/Residential<br> Treatment</h5>
        </div>
        <div id="outpatient" class="absolute text-center -translate-x-1/2 bg-white rounded-sm p-sp-2 bottom-sp-8 left-1/2">
          <h5 class="mb-0 lg:text-h5 text-[12px]">Outpatient Care</h5>
        </div>
      </div>
      <div id="symptomsUp" class="z-10 flex flex-col items-center gap-sp-4 lg:flex-row">
        <h5 class="text-center text-[10px] lg:text-h5">Worsening<br> Symptoms<br> "Step Up"</h5>
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="103" viewBox="0 0 38 103" fill="none">
          <path d="M20.7678 1.23223C19.7915 0.255922 18.2085 0.255922 17.2322 1.23223L1.32233 17.1421C0.346023 18.1184 0.346023 19.7014 1.32233 20.6777C2.29864 21.654 3.88156 21.654 4.85787 20.6777L19 6.53553L33.1421 20.6777C34.1184 21.654 35.7014 21.654 36.6777 20.6777C37.654 19.7014 37.654 18.1184 36.6777 17.1421L20.7678 1.23223ZM21.5 103L21.5 3L16.5 3L16.5 103L21.5 103Z" fill="#ED6C50" />
        </svg>
      </div>
    </div>
    <h3 id="concerns" class="mb-0 mt-sp-4">Mental Health Concerns</h3>
  </div>
</div>