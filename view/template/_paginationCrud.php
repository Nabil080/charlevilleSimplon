<nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
    aria-label="Table navigation">
    <span id="candidates-info" class="text-sm font-normal ">
        <span id="candidates-range" class=""></span>
        <span id="candidates-number" class=""></span>
    </span>
    <ul class="inline-flex items-stretch -space-x-px">
        <li id="first-page">
            <a
                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-black cursor-pointer bg-white rounded-l-lg border border-gray-300 hover:bg-main-red hover:text-main-white">
                <i class="fa fa-angles-left"></i>
            </a>
        </li>
        <li id="prev-page">
            <a
                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-black cursor-pointer bg-white border border-gray-300 hover:bg-main-red hover:text-main-white">
                <i class="fa fa-chevron-left"></i>
            </a>
        </li>

        <ul id="pagination" class="inline-flex items-stretch -space-x-px"></ul>

        <li id="next-page">
            <a
                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-black cursor-pointer bg-white border border-gray-300 hover:bg-main-red hover:text-main-white">
                <i class="fa fa-chevron-right"></i>
            </a>
        </li>
        <li id="last-page">
            <a
                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-black cursor-pointer bg-white rounded-r-lg border border-gray-300 hover:bg-main-red hover:text-main-white">
                <i class="fa fa-angles-right"></i>
            </a>
        </li>
    </ul>
</nav>