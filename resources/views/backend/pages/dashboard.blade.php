@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="row gy-5 g-xl-8">
    <div class="col-xl-4">
        <div class="card card-xl-stretch">
            <div class="card-header border-0 bg-danger py-5">
                <h3 class="card-title fw-bolder text-white">Ticket Statistics</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
                                </g>
                            </svg>
                        </span>
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Action</div>
                        </div>
                        <div class="menu-item px-3">
                            <a href="{{route('tickets.index')}}" class="menu-link px-3">Ticket List</a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="{{route('tickets.create')}}" class="menu-link flex-stack px-3">Add New</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 200px; min-height: 200px;"><div id="apexcharts51y6ihea" class="apexcharts-canvas apexcharts51y6ihea apexcharts-theme-light" style="width: 100%; height: 200px;"><svg id="SvgjsSvg1781" class="w-100" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1783" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1782"><clipPath id="gridRectMask51y6ihea"><rect id="SvgjsRect1786" width="352" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask51y6ihea"></clipPath><clipPath id="nonForecastMask51y6ihea"></clipPath><clipPath id="gridRectMarkerMask51y6ihea"><rect id="SvgjsRect1787" width="349" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter1793" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1794" flood-color="#cb1b46" flood-opacity="0.5" result="SvgjsFeFlood1794Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1795" in="SvgjsFeFlood1794Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1795Out"></feComposite><feOffset id="SvgjsFeOffset1796" dx="0" dy="5" result="SvgjsFeOffset1796Out" in="SvgjsFeComposite1795Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1797" stdDeviation="3 " result="SvgjsFeGaussianBlur1797Out" in="SvgjsFeOffset1796Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1798" result="SvgjsFeMerge1798Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1799" in="SvgjsFeGaussianBlur1797Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1800" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1801" in="SourceGraphic" in2="SvgjsFeMerge1798Out" mode="normal" result="SvgjsFeBlend1801Out"></feBlend></filter><filter id="SvgjsFilter1803" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1804" flood-color="#cb1b46" flood-opacity="0.5" result="SvgjsFeFlood1804Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1805" in="SvgjsFeFlood1804Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1805Out"></feComposite><feOffset id="SvgjsFeOffset1806" dx="0" dy="5" result="SvgjsFeOffset1806Out" in="SvgjsFeComposite1805Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1807" stdDeviation="3 " result="SvgjsFeGaussianBlur1807Out" in="SvgjsFeOffset1806Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1808" result="SvgjsFeMerge1808Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1809" in="SvgjsFeGaussianBlur1807Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1810" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1811" in="SourceGraphic" in2="SvgjsFeMerge1808Out" mode="normal" result="SvgjsFeBlend1811Out"></feBlend></filter></defs><g id="SvgjsG1812" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1813" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1822" class="apexcharts-grid"><g id="SvgjsG1823" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1825" x1="0" y1="0" x2="345" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1826" x1="0" y1="20" x2="345" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1827" x1="0" y1="40" x2="345" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1828" x1="0" y1="60" x2="345" y2="60" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1829" x1="0" y1="80" x2="345" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1830" x1="0" y1="100" x2="345" y2="100" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1831" x1="0" y1="120" x2="345" y2="120" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1832" x1="0" y1="140" x2="345" y2="140" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1833" x1="0" y1="160" x2="345" y2="160" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1834" x1="0" y1="180" x2="345" y2="180" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1835" x1="0" y1="200" x2="345" y2="200" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1824" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1837" x1="0" y1="200" x2="345" y2="200" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1836" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1788" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1789" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1792" d="M 0 200L 0 125C 20.125 125 37.375 87.5 57.5 87.5C 77.625 87.5 94.875 120 115 120C 135.125 120 152.375 25 172.5 25C 192.625 25 209.875 100 230 100C 250.125 100 267.375 100 287.5 100C 307.625 100 324.875 100 345 100C 345 100 345 100 345 200M 345 100z" fill="transparent" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask51y6ihea)" filter="url(#SvgjsFilter1793)" pathTo="M 0 200L 0 125C 20.125 125 37.375 87.5 57.5 87.5C 77.625 87.5 94.875 120 115 120C 135.125 120 152.375 25 172.5 25C 192.625 25 209.875 100 230 100C 250.125 100 267.375 100 287.5 100C 307.625 100 324.875 100 345 100C 345 100 345 100 345 200M 345 100z" pathFrom="M -1 200L -1 200L 57.5 200L 115 200L 172.5 200L 230 200L 287.5 200L 345 200"></path><path id="SvgjsPath1802" d="M 0 125C 20.125 125 37.375 87.5 57.5 87.5C 77.625 87.5 94.875 120 115 120C 135.125 120 152.375 25 172.5 25C 192.625 25 209.875 100 230 100C 250.125 100 267.375 100 287.5 100C 307.625 100 324.875 100 345 100" fill="none" fill-opacity="1" stroke="#cb1b46" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask51y6ihea)" filter="url(#SvgjsFilter1803)" pathTo="M 0 125C 20.125 125 37.375 87.5 57.5 87.5C 77.625 87.5 94.875 120 115 120C 135.125 120 152.375 25 172.5 25C 192.625 25 209.875 100 230 100C 250.125 100 267.375 100 287.5 100C 307.625 100 324.875 100 345 100" pathFrom="M -1 200L -1 200L 57.5 200L 115 200L 172.5 200L 230 200L 287.5 200L 345 200"></path><g id="SvgjsG1790" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1843" r="0" cx="0" cy="0" class="apexcharts-marker w0x7o7l7p no-pointer-events" stroke="#cb1b46" fill="#f1416c" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1791" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1838" x1="0" y1="0" x2="345" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1839" x1="0" y1="0" x2="345" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1840" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1841" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1842" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1821" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1784" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 100px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: transparent;"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                <div class="card-p mt-n20 position-relative">
                    <div class="row g-0">
                        <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <a href="javascript:void(0);" class="text-warning fw-bold fs-6">Pending</a>
                        </div>
                        <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <a href="javascript:void(0);" class="text-primary fw-bold fs-6">On Process</a>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <a href="javascript:void(0);" class="text-success fw-bold fs-6">Resolved</a>
                        </div>
                        <div class="col bg-light-danger px-6 py-8 rounded-2 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <a href="javascript:void(0);" class="text-danger fw-bold fs-6">Canceled</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card card-xl-stretch mb-xl-8">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder mb-2 text-dark">Tickets</span>
                    <span class="text-muted fw-bold fs-7">{{$tickets->count()}}</span>
                </h3>
            </div>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                    <span class="svg-icon svg-icon-warning me-5">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Pending</a>
                        <span class="text-muted fw-bold d-block">{{ \App\Ticket::where('status', 'pending')->get()->count()}}</span>
                    </div>
                    <span class="fw-bolder text-warning py-1">@if($tickets->count()>0) {{ round((\App\Ticket::where('status', 'pending')->get()->count()*100)/$tickets->count()), 2 }}@else 0 @endif%</span>
                </div>
                <div class="d-flex align-items-center bg-light-primary rounded p-5 mb-7">
                    <span class="svg-icon svg-icon-primary me-5">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">On Process</a>
                        <span class="text-muted fw-bold d-block">{{ \App\Ticket::where('status', 'on-progress')->get()->count()}}</span>
                    </div>
                    <span class="fw-bolder text-primary py-1">@if($tickets->count()>0) {{ round((\App\Ticket::where('status', 'on-progress')->get()->count()*100)/$tickets->count()), 2 }} @else 0 @endif%</span>
                </div>
                <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                    <span class="svg-icon svg-icon-success me-5">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Resolved</a>
                        <span class="text-muted fw-bold d-block">{{ \App\Ticket::where('status', 'resolved')->get()->count()}}</span>
                    </div>
                    <span class="fw-bolder text-success py-1">@if($tickets->count()>0) {{ round((\App\Ticket::where('status', 'resolved')->get()->count()*100)/$tickets->count()), 2 }} @else 0 @endif%</span>
                </div>
                <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
                    <span class="svg-icon svg-icon-danger me-5">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Cancel</a>
                        <span class="text-muted fw-bold d-block">{{ \App\Ticket::where('status', 'canceled')->get()->count()}}</span>
                    </div>
                    <span class="fw-bolder text-danger py-1">@if($tickets->count()>0) {{ round((\App\Ticket::where('status', 'canceled')->get()->count()*100)/$tickets->count()), 2 }} @else 0 @endif%</span>
                </div>
            </div>
            <div class="card-footer align-items-center text-center border-0 mb-4">
                <a href="{{route('tickets.index')}}" class="btn btn-light-primary font-weight-bold">View All</a>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card card-xl-stretch">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder mb-2 text-dark">Activities</span>
                    <span class="text-muted fw-bold fs-7">Recent Changelog</span>
                </h3>
            </div>
            <div class="card-body pt-5">
                @if($tickets->count()>0)
                <div class="timeline-label">
                    @foreach($tickets->take(6) as $ticket)
                    <div class="timeline-item">
                        <div class="timeline-label">
                            <span class="fw-bolder text-gray-800 fs-7">{{ Carbon\Carbon::parse($ticket->updated_at)->format('d-M-Y') }}</span>
                            <br>
                            <span class="fw-lighter fs-8">{{ Carbon\Carbon::parse($ticket->updated_at)->format('g:i A') }}</span>
                        </div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless @if($ticket->updated_at > $ticket->created_at) text-warning @else text-primary @endif fs-1"></i>
                        </div>
                        <div class="fw-mormal timeline-content text-muted ps-3">
                            <a class="@if($ticket->updated_at > $ticket->created_at) text-warning @else text-primary @endif" href="{{route('tickets.show', $ticket->id)}}">
                                @if($ticket->updated_at > $ticket->created_at){{$ticket->UpdatedBy->name}} has updated a ticket about {{$ticket->category}} @else @if($ticket->CreatedBy != null) {{$ticket->CreatedBy->name}} @else {{$ticket->external_created_by}} @endif has created a ticket about {{$ticket->category}} @endif
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                No logs available
                @endif
            </div>
            <div class="card-footer align-items-center text-center border-0 mb-4">
                <a href="{{route('changelog')}}" class="btn btn-light-primary font-weight-bold">View All</a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts-bottom')

@endpush