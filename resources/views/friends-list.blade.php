<div class="w-full flex flex-col fixed border-gray-300 px-6 py-4 rounded-lg bg-gray-200 border lg:w-1/6">
    <h1 class="font-bold mb-4 text-xl">Followings</h1>
    <ul class="px-2">
        @forelse(auth()->user()->follows as $user)
            <li class="{{$loop->last ? '' : 'mb-4'}}">
                <div>
                    <a href="{{$user->path()}}" class="flex items-center">
                        <img src="{{$user->avatar}}" alt="" class="rounded-full mr-2 w-10 h-10 ">
                        {{$user->name}}
                    </a>
                </div>
            </li>
        @empty
            <li class="mb-4 flex" >
                <svg class="w-12 h-12" width="102" height="221" viewBox="0 0 102 221" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.19716 60.0334C1.18773 59.9835 1.17807 59.9338 1.16871 59.8839C0.951154 58.6925 0.760136 57.492 0.628736 56.2728C0.580476 55.8623 0.544188 55.4399 0.508008 55.0294C0.471758 54.607 0.435621 54.1965 0.411451 53.7741C0.363191 53.086 0.338997 52.3859 0.326917 51.6857C0.314827 51.384 0.314832 51.0701 0.314832 50.7684L0.314832 50.5873C0.314832 50.2131 0.314827 49.8389 0.326917 49.4647C0.338997 49.1388 0.351092 48.8129 0.363172 48.499C0.363172 48.3179 0.375181 48.1368 0.387281 47.9679C0.800169 40.3144 2.94297 32.8541 6.65456 26.1481C10.3661 19.4421 15.5499 13.6649 21.816 9.25094C28.0821 4.83701 35.2674 1.90125 42.8316 0.664435C50.3957 -0.572379 58.1419 -0.0780568 65.4875 2.11024C72.8331 4.29853 79.587 8.12384 85.2412 13.2985C90.8953 18.4731 95.3027 24.8624 98.1317 31.9858C100.961 39.1092 102.138 46.7813 101.575 54.4252C101.011 62.0691 98.7221 69.4858 94.8793 76.1176C90.4247 68.4286 84.0273 62.0456 76.3284 57.6083C68.6294 53.1711 59.8994 50.8354 51.0133 50.8354C42.1271 50.8354 33.397 53.1711 25.6981 57.6083C17.9991 62.0456 11.6017 68.4286 7.14711 76.1176C4.26073 71.1349 2.24837 65.6949 1.19716 60.0334V60.0334Z" fill="#47D5FE"/>
                    <path d="M72.0328 66.702C72.0348 68.9967 71.8043 71.2859 71.3448 73.5342C65.0713 76.1948 58.3265 77.5659 51.5121 77.5659C44.6977 77.5659 37.953 76.1948 31.6794 73.5342C31.2199 71.2859 30.9894 68.9967 30.9913 66.702C30.9913 54.7758 37.0631 44.6965 45.4284 41.3287C42.0885 39.924 39.3377 37.4069 37.6427 34.2046C35.9478 31.0023 35.4132 27.3121 36.1297 23.7604C36.8462 20.2088 38.7696 17.0145 41.5735 14.7198C44.3774 12.4251 47.8889 11.1713 51.5121 11.1713C55.1353 11.1713 58.6469 12.4251 61.4508 14.7198C64.2547 17.0145 66.1781 20.2088 66.8946 23.7604C67.6111 27.3121 67.0765 31.0023 65.3815 34.2046C63.6866 37.4069 60.9357 39.924 57.5959 41.3287C65.9611 44.6965 72.0328 54.7758 72.0328 66.702Z" fill="white"/>
                    <path d="M11.0209 128.607C9.47319 130.543 8.073 132.593 6.83226 134.739C2.35684 127.041 -0.000414762 118.295 5.11866e-05 109.39L5.12151e-05 108.738C0.0891499 100.983 1.95618 93.3518 5.45745 86.4316C8.95872 79.5115 14.0009 73.4868 20.196 68.8211C26.3912 64.1555 33.5741 60.9733 41.1921 59.5194C48.8101 58.0655 56.6601 58.3786 64.1381 60.4347C71.6161 62.4908 78.5227 66.2351 84.3265 71.3794C90.1303 76.5237 94.6766 82.9309 97.6155 90.108C100.554 97.2851 101.808 105.041 101.279 112.778C100.75 120.516 98.4528 128.029 94.5646 134.739C90.4404 127.578 84.6251 121.535 77.6268 117.14C70.6285 112.745 62.6602 110.131 54.4183 109.526C46.1765 108.921 37.9119 110.343 30.3469 113.67C22.7818 116.996 16.1465 122.124 11.0209 128.607V128.607Z" fill="#47D5FE"/>
                    <path d="M72.0415 126.151C72.0435 128.446 71.813 130.735 71.3535 132.983C65.0799 135.644 58.3352 137.015 51.5208 137.015C44.7064 137.015 37.9616 135.644 31.6881 132.983C31.2286 130.735 30.998 128.446 31 126.151C31 114.225 37.0718 104.146 45.437 100.778C42.0972 99.3732 39.3464 96.8561 37.6514 93.6538C35.9565 90.4515 35.4219 86.7613 36.1383 83.2097C36.8548 79.658 38.7783 76.4637 41.5821 74.169C44.386 71.8743 47.8976 70.6205 51.5208 70.6205C55.144 70.6205 58.6556 71.8743 61.4595 74.169C64.2633 76.4637 66.1868 79.658 66.9032 83.2097C67.6197 86.7613 67.0851 90.4515 65.3902 93.6538C63.6952 96.8561 60.9444 99.3732 57.6046 100.778C65.9698 104.146 72.0415 114.225 72.0415 126.151Z" fill="white"/>
                    <path d="M51.0132 220.067C40.986 220.067 31.184 217.094 22.8467 211.523C14.5094 205.952 8.01131 198.034 4.17407 188.77C0.336831 179.506 -0.667206 169.312 1.289 159.478C3.24521 149.643 8.07377 140.61 15.1641 133.52C22.2544 126.429 31.2879 121.601 41.1224 119.644C50.957 117.688 61.1507 118.692 70.4146 122.53C79.6785 126.367 87.5966 132.865 93.1674 141.202C98.7382 149.539 101.712 159.341 101.712 169.369C101.712 176.027 100.401 182.62 97.8537 188.771C95.3061 194.922 91.5717 200.511 86.8638 205.219C82.1559 209.927 76.5667 213.662 70.4154 216.209C64.2641 218.757 57.6712 220.068 51.0132 220.067Z" fill="#47D5FE"/>
                    <path d="M72.0328 196.702C72.0348 198.997 71.8043 201.286 71.3448 203.534C65.0713 206.195 58.3265 207.566 51.5121 207.566C44.6977 207.566 37.953 206.195 31.6794 203.534C31.2199 201.286 30.9894 198.997 30.9913 196.702C30.9913 184.776 37.0631 174.696 45.4284 171.329C42.0885 169.924 39.3377 167.407 37.6427 164.205C35.9478 161.002 35.4132 157.312 36.1297 153.76C36.8462 150.209 38.7696 147.015 41.5735 144.72C44.3774 142.425 47.8889 141.171 51.5121 141.171C55.1353 141.171 58.6469 142.425 61.4508 144.72C64.2547 147.015 66.1781 150.209 66.8946 153.76C67.6111 157.312 67.0765 161.002 65.3815 164.205C63.6866 167.407 60.9357 169.924 57.5959 171.329C65.9611 174.696 72.0328 184.776 72.0328 196.702Z" fill="white"/>
                </svg>

                    <h1 class="text-gray-600 mt-2 text-whitespace-no-wrap text-nowrap">No followings yet</h1>
            </li>
        @endforelse
     </ul>





</div>
