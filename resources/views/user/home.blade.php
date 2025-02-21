@include('user.header')
<!-- * App Header -->
<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full bg-primary">
        <!-- carousel single -->
        <div class="carousel-single splide p-2">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <!-- card block -->
                        <div class="card-block bg-transparent border border-info">
                            <div class="card-main">
                                <div class="balance">
                                    <span class="label">SAVINGS</span>
                                    <h1 class="title">
                                        {{ Auth::user()->currency }} {{ number_format($savings_balance, 2) }}
                                    </h1>
                                </div>
                                <div class="in">
                                    <div class="card-number">
                                        <span class="label">Account Number</span>
                                        {{ Auth::user()->account_number }}
                                    </div>
                                    <div class="bottom">
                                        <div class="card-expiry">
                                            <span class="label">Last Login <br></span>
                                            {{ $activity->last_login_at
                                            ? \Carbon\Carbon::parse($activity->last_login_at)->format('d M y, gA')
                                            : \Carbon\Carbon::now()->format('d M y, gA') }}
                                        </div>


                                        <div class="card-ccv">
                                            <span class="label">Your IP address<br> </span>
                                            @if($flagUrl)
                                            <img src="{{ $flagUrl }}" alt="Country Flag">
                                            @else
                                            No Flag Available
                                            @endif
                                            <br>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- * card block -->
                    </li>
                    <li class="splide__slide">
                        <!-- card block -->
                        <div class="card-block bg-transparent border border-light">
                            <div class="card-main">
                                <div class="balance">
                                    <span class="label">CHECKINGS</span>
                                    <h1 class="title">
                                        {{ number_format($checking_balance, 2) }}
                                    </h1>
                                </div>
                                <div class="in">
                                    <div class="card-number">
                                        <span class="label">Account Number</span> {{
                                        Auth::user()->account_number }}
                                    </div>
                                    <div class="bottom">
                                        <div class="card-expiry">
                                            <span class="label">Total Credit <br> {{ $currentMonth }}</span>
                                            {{ Auth::user()->currency }} {{ number_format($totalCheckingCredit, 2) }}
                                        </div>
                                        <div class="card-ccv">
                                            <span class="label">Total Debit<br> {{ $currentMonth }}</span>
                                            {{ Auth::user()->currency }} {{ number_format($totalCheckingDebit, 2) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- * card block -->
                    </li>
                    {{-- <li class="splide__slide">
                        <!-- card block for user activity -->
                        <div class="card-block bg-transparent border border-warning">
                            <div class="card-main">
                                <div class="balance">
                                    <span class="label">Last Login Details</span>
                                </div>
                                <div class="in">
                                    <div class="card-number">
                                        <span class="label">Last Login</span>
                                        {{ $activity->last_login_at ?? 'N/A' }}
                                    </div>
                                    <div class="card-number">
                                        <span class="label">IP Address</span>
                                        {{ $clientIpAddress }}
                                    </div>
                                    <div class="card-number">
                                        <span class="label">Location</span>
                                        {{ $location ? $location->cityName . ', ' . $location->countryName : 'Unknown'
                                        }}
                                    </div>
                                    <div class="card-number">
                                        <span class="label">User Agent</span>
                                        {{ $activity->last_login_user_agent ?? 'N/A' }}
                                    </div>
                                    <div class="card-number">
                                        <span class="label">Country Flag</span>
                                        @if($flagUrl)
                                        <img src="{{ $flagUrl }}" alt="Country Flag">
                                        @else
                                        No Flag Available
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- * card block -->
                    </li> --}}
                </ul>
            </div>
        </div>
        <!-- * carousel single -->

    </div>

    <div class="card">
        <div class="row">

            <div class="col-lg-8">
                <div class="section wallet-card-section mb-1">
                    <div class="wallet-card">
                        <!-- Wallet Footer -->
                        <div class="wallet-footer mb-2">
                            <div class="item">
                                <a href="{{ route('transfer.form', ['type' => 'wire']) }}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-share-square"></i>
                                    </div>
                                    <strong>Wire <br>Transfer</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('transfer.form', ['type' => 'local']) }}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-share-square"></i>
                                    </div>
                                    <strong>Local <br>Transfer</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('transfer.form', ['type' => 'internal']) }}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-share-square"></i>
                                    </div>
                                    <strong>Interbank <br>Transfer</strong>
                                </a>
                            </div>
                        </div>

                        <!-- Additional Transfers -->
                        <div class="wallet-footer mb-2">
                            <div class="item">
                                <a href="{{ route('transfer.form', ['type' => 'paypal']) }}">
                                    <div class="icon-wrapper">
                                        <i class="fab fa-paypal"></i>
                                    </div>
                                    <strong>PayPal <br>Transfer</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('transfer.form', ['type' => 'crypto']) }}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <strong>Crypto <br>Transfer</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('transfer.form', ['type' => 'skrill']) }}">
                                    <div class="icon-wrapper">
                                        <i class="fab fa-skrill"></i>
                                    </div>
                                    <strong>Skrill <br>Transfer</strong>
                                </a>
                            </div>
                        </div>


                        <!-- Wallet Footer -->
                        <div class="wallet-footer mb-2">
                            <div class="item">
                                <a href="user/Account/Buy-Crypto">
                                    <div class="icon-wrapper">
                                        <i class="fab fa-btc"></i>
                                    </div>
                                    <strong>Buy <br>Crypto</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#payBills">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-money-check"></i>
                                    </div>
                                    <strong>Pay <br>Bills</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addBeneficiary">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <strong>Add <br>Beneficiary</strong>
                                </a>
                            </div>
                        </div>



                        <div class="wallet-footer mb-2">
                            <div class="item">
                                <a href="{{route('user.card.deposit.create')}}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <strong>Card <br>Deposit</strong>
                                </a>

                            </div>
                            <div class="item">
                                <a href="{{route('user.crypto.deposit')}}">
                                    <div class="icon-wrapper">
                                        <i class="fab fa-btc"></i>
                                    </div>
                                    <strong>Crypto <br>Deposit</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{route('user.cheque.deposit.create')}}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-money-check"></i>
                                    </div>
                                    <strong>Check <br>Deposit</strong>
                                </a>
                            </div>


                        </div>
                        <!-- * Wallet Footer -->
                        <!-- Wallet Footer -->
                        <div class="wallet-footer mb-2">
                            <div class="item">
                                <a href="{{route('savings.page')}}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-list-alt"></i>
                                    </div>
                                    <strong>Savings <br>Statement</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{route('checking.page')}}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-list"></i>
                                    </div>
                                    <strong>Checking <br>Statement</strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{route('notifications.index')}}">
                                    <div class="icon-wrapper">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <strong>
                                        First<br>Alerts
                                    </strong>
                                </a>
                            </div>
                        </div>
                        <!-- * Wallet Footer -->
                        <!-- Wallet Footer -->
                        <div class="wallet-footer mb-2">
                            <div class="item">
                                <a href="{{route('loan')}}">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </div>
                                    <strong>
                                        First<br>Loans
                                    </strong>
                                </a>

                            </div>
                            <div class="item">
                                <a href="user/Account/Investment">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <strong>
                                        First<br>Investments
                                    </strong>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{route('user.support')}}">
                                    <div class="icon-wrapper">
                                        <i class="far fa-comment-dots"></i>
                                    </div>
                                    <strong>
                                        First<br>Support
                                    </strong>
                                </a>
                            </div>


                        </div>
                        <!-- * Wallet Footer -->
                        <hr>
                        <!-- news -->
                        <!-- news -->
                        <hr>
                        <!-- Send Money -->

                        <!-- * Send Money -->
                    </div>
                </div>
                <!-- Wallet Card -->

                <div class="section wallet-card-section mb-1">
                    <div class="wallet-card">
                        <div class="section full mt-2">
                            <div class="section-heading padding">
                                <h3 class="label text-primary">Beneficiaries</h3>
                                <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#addBeneficiary">Add New&nbsp;<i class="fas fa-user-plus"></i></a>
                            </div>
                            <hr>
                            <!-- carousel small -->
                            <div class="text-center">No Beneficiary. <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#addBeneficiary">Add New</i></a>
                            </div>
                            <!-- * carousel small -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="section wallet-card-section mb-1">
                    <div class="wallet-card" id="cards">
                        <h5 class="text-primary">
                            Everguard&nbsp;Cards
                        </h5>
                        <hr>
                        <style>
                            @font-face {
                                font-family: 'ocr_a_std';
                                src: url(data:application/font-woff2;charset=utf-8;base64,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) format('woff2'), url(data:application/font-woff;charset=utf-8;base64,d09GRgABAAAAAGyoABMAAAAA2AAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAABGRlRNAAABqAAAABwAAAAcXqsDqUdERUYAAAHEAAAAMgAAADgCNgESR1BPUwAAAfgAAAAqAAAAMJTZjMpHU1VCAAACJAAAAK0AAAFmmkmbh09TLzIAAALUAAAAWQAAAGCaRD/GY21hcAAAAzAAAAGTAAAB6o8SHpdjdnQgAAAExAAAACoAAAAqDZYIX2ZwZ20AAATwAAABsQAAAmVTtC+nZ2FzcAAABqQAAAAIAAAACAAAABBnbHlmAAAGrAAAXiEAAMIcPxsSdmhlYWQAAGTQAAAAMAAAADYKCjbeaGhlYQAAZQAAAAAeAAAAJAxcBWlobXR4AABlIAAAAQ0AAAOS67faEmxvY2EAAGYwAAABwAAAAcz4kyoWbWF4cAAAZ/AAAAAgAAAAIAIBAZRuYW1lAABoEAAAAgIAAAQqQxCNH3Bvc3QAAGoUAAAB4AAAArPQLwRlcHJlcAAAa/QAAACsAAABD2fXdiR3ZWJmAABsoAAAAAYAAAAGxXdWYwAAAAEAAAAAzD2izwAAAAC/4+rjAAAAANKJdfZ42mNgZGBg4ANiAwYQYGJgZWBkYAdiDiBkYuBkqAKyqxlqgew6hidANgtYFQMAPkQDSQAAeNpjYGRgYOBi0GHQY2BSAAIGvpzEkjwGCQYWoDjD//9AAsECAgCH/AbBAAB42q2OvQrCQBCEv+QSkRBSaPwpLFKIWASLFCLWPoFvcChWIUJII+oLWft+cbMcadJ6cDM3O8Ps4QERexr8TA5JaZuKFYHMaVt8PEyvjJAvKrS2bMhutb2wUczv9bWiUDxIquvt0Ff0FANFQ0hMKjvW5M7ZOq9wXLn5x/FXeiK5JQ/tPHEWPkpXzJKddo9FTZiKOyLhpWrGU3mhiXf/NpJLmf+lY/izweQHiTgd7QAAAHjaY2BiPcQ4gYGVgYXVmOUsAwPDLAjNdJbhLNM0IM3PxsnAyMLGzN7AwLA+gEHJiwEKAiKDghkcGHh/M7FZ/rNkYGCbxiQIFGYEybEEsAFFGBQYmAHrDw3YAAAAeNpjYGBgZoBgGQZGBhB4AuQxgvksDCeAtB6DApDFx8DLUMewkWEHw3/GYMYKpmNMdxS4FEQUpBTkFJQU1BT0FawU4hXWKCqp/vnN9P8/UB8vUN8Chi0MuxiDoOoZFAQUJBRkoOot4eoZ//////X/4/+H/h/4v/9/7n/Pv3/+Pn9w5MH+B3se7H6w48HWB2sfLHnQ8MDk/v5bz1gfQd1JAmBkY4BrYmQCEkzoCoBBwMLKxs7BycXNw8vHLyAoJCwiKiYuISklLSMrJ6+gqKSsoqqmrqGppa2jq6dvYGhkbGJqZm5haWVtY2tn7+Do5Ozi6ubu4enl7ePr5x8QGBQcEhoWHhEZFR0TGxefkMjQ3NLWMWHq7AXzFy5etGTZiuUrV61ZvXbdhk0bN2/dsnPHrt0MRSmpmbfK5hVkPyzJYmidzlDMwJBeCnZdTiXD0u11yXkgdm7V7aT6pin7D1y6fP3GlavbGPYdZHhw997jJwzl124yNHY2dLX39PZ1T5rMMHHmrBkMhw4XAjVVADEA8VyP6gAAAADFAMQAzADNANkBFgF9AM0AwgDDAMQAxwDNAM8BKQH6ALgAvgBEBREAAHjaXVG7TltBEN0NDwOBxNggOdoUs5mQxnuhBQnE1Y1iZDuF5QhpN3KRi3EBH0CBRA3arxmgoaRImwYhF0h8Qj4hEjNriKI0Ozuzc86ZM0vKkap36WvPU+ckkMLdBs02/U5ItbMA96Tr642MtIMHWmxm9Mp1+/4LBpvRlDtqAOU9bykPGU07gVq0p/7R/AqG+/wf8zsYtDTT9NQ6CekhBOabcUuD7xnNussP+oLV4WIwMKSYpuIuP6ZS/rc052rLsLWR0byDMxH5yTRAU2ttBJr+1CHV83EUS5DLprE2mJiy/iQTwYXJdFVTtcz42sFdsrPoYIMqzYEH2MNWeQweDg8mFNK3JMosDRH2YqvECBGTHAo55dzJ/qRA+UgSxrxJSjvjhrUGxpHXwKA2T7P/PJtNbW8dwvhZHMF3vxlLOvjIhtoYEWI7YimACURCRlX5hhrPvSwG5FL7z0CUgOXxj3+dCLTu2EQ8l7V1DjFWCHp+29zyy4q7VrnOi0J3b6pqqNIpzftezr7HA54eC8NBY8Gbz/v+SoH6PCyuNGgOBEN6N3r/orXqiKu8Fz6yJ9O/sVoAAAAAAQAB//8AD3javL0LdBxnmShYf/VDrVarVf0stVqtVqlUXS6VWqXuUqtVarUkS7Isy47iKI4wxjiOcUwemMQxuSb4ZrM5TDYTQggQJsAdJpPLZHI4WZatapswkxsggQlZbvDMZXPinGxuJsNAxggCu5vhMsSxmv2+v6qlbkl2HrDjY3XXo6X+v/fz/4phmRmGYQ97rmJcTBMzYBFGG6s0uSO/yltez38fq7hYOGQsF1724OVKkzd6YaxC8LoeEkKSEBJm2O5qL/lS9TrPVef/1xn3GQb+JLvIMK6jXoNpYTqZHFPxM4xqubzLZptGzJRmMmfNQN5qals2I/TN6iIqY7W5QmEzYQzmpMJQieRTJKqSnlBmGI7jTa6gS+zJyOzi8cJx+O/unLpuKumW2Oa4kp6Q2VsLt8J/z1fnL7tsfmVrckCKLRQYwpxzPeJ+GdaRYATGDGoWcS1XgsSvnmKC0WbVbM4Ts0OzkvDtg7lIQYg53+IS6MEAK59z/Wav188rYkHwbasuz7r9USEpKnF/k+f5I0equ5JZIbwrS3ZXTV4Vo2Ehm0T4md8xZ9zPeV5grmTex3yaMa/QrOFpXbdc7LKl7cnnK1e4YA2TV8zDGsp506tZ2SW4HYDbiQzcDnjxdiACt7thiXs18/Kzlrs1n7e2tSxb7fgXLt+GH7mcoVCY2zhriqhWx1XwkRH4iDQAHxmZwo+M6PCRvrz1fhvIIUBnAWAs0IOhcVbPd7Epotcd5uOxqFclsdWDaJBFZJSJWHfYk5H0gvi7xUK5XFiE16awLApbIt6nvXighL3jeHncfvWGFUGUw3AzonTDQRP8Drnn6afZ2yfEn/VMTojPJnK9iURvvv3ZtSNxAm7iC1yS2tulXOLZtaOer/4M6cswlL46s5ep9AOXmTnNlAHR7mXEahreujSrFd7ieTMMzDekmc1nTSZvpX3LZpqzNKKawbylwFksbyqc5QY09sJZR94q1DCmCwUBMBaiR/CSj6eIQJEjCjE8CNEjeOnJlAl89Ny4wj61MqmMjyskqxWLgySrlMvKygT7NL5Xn9dGilr1eWWcfL+o3Qcf2qeUf5srFHK/xQ/fB594VBl3LgA/uVbhTDIqs51ZYCpTKFF6E8ClWU1Ny8Sco1LVmT/dxjFRt2q2cVY/UU+X7DMxb+1AEdOnQmFri2IYVlMcjroFw0DGHxoujhMUM76LgNh5m4IERC8jDxBuuEiG43zc20SCbEb2XOKj55o4PtfzBTEX55q8IX5QtA/ZhCvLH0glXe0X/s+ApMpBdsYLHxQfEHM856079MzcklLiKb8/xW9JwSGfavZ38spbp/em3FKKdKb2pt56ORBkg8HS8dQWnn5Q6Ty++jurePLcy0wAjvYyh5nKKPKEpltXAgvs0qw2N6Dq/RRVLXlrL9B5Km/u5axtQPWob9naB+/b9obCp5qGO67q5Q0zGqq0J3XDMBjrylHAWD8cm7tCp9ubMjNL8AGKvXF2ggACymSI6ipAS5BtIzwgyhYhOO5y2eyhkaagy0FYGD7JFwtjZABR6GWjXYDYotwUO8e2xPlHn+Z9D9350zsf9QZT8ZdflpPTkloWoovZQDoZLWRTcvj6O8N8PNX+X0rXZnPSc+w3/rlNkn8qif6Qovz18VceIuk7k93J9sjn/iHZI372zi8/cPdnUz1w/uTPBd6YVFN9oe1aQJCkiFpKRI8eDUZ87qSifcT1dS29/emntwu5NBe+cE2a9x/69advYQgbdD3iegR4MMhsYcxm7TRpYprcqvNGQLVbDDCcizKcxVHZITWVCpqUDZIH93pb4oq4Tn3aSpOQV4CAr8HfVxmFqYhINz8IbD8Sy+J9yxWeQb3Nd4M6a81bWfsLQhT5NUSjlQBh7GL5SBepIXzARV4JJLPiM4l+RSl0tL0SjflZ1h+LvsilDUVS4s+J2WSAvZMUC1ftmFfeSPdNyEk1XH0l2Z2WhOoPBbkrnaz+jM8m1ZKcfFOZ27WHaVxvhqkouN64vd7ms1Y3rLe5G9fbDErcWawEshMZd4EeAXS4BoitStKkC9eMHBNErUpeSXMvRmMtLNsSjb0STBYUJZt4RhhIBgJJrfs5HlZsHElmedKZTHfJAikKUro7ScSwmpQn1K43lPkde4arPyzs2TWnvJmUS7hWkAsT5OIepgSWkJhjmjl01mzLWwM+VIxWuaboilmytqwQfY+FVtm4qZWsYTVE3wuhJrrocyMdpLX6UrR3NJvYEnoZtdjLnJLIGmK0+hIJJItGVijy30G1911+WMiOkmekQvxfLnBqSt0aDz1JVFR21Ree5PitcIm78C98oVedVGN/Vf2/csOFPMn8VbR/krFhISLAkmTSzCKDzkTEVveBfCVFrWqqvVmtuFJ46PI1A2d2a2byrOnOWzEAtyVfiSXxXoyDjyVjeJgEK2oJa9q+BnlNx9dgtTV7vUZf0+SuVFEjudzwcK76D3i/+jxCBJ+lvFIBvcSxLzAxpo+pBJFXIhqumgDPmKGzVgvwS6gF+SWEa+Ft5sa1UEUbq1sBqcASbk9l+EQTfI9WfUEZZ28qal6eHxCqUfqlX9XwO0+wD7l3ub7EtDIDjNminXZ5GQXk1X4j4A2BYJ1u4qgQ229WW/33UtDh+06UJsmrE2NjE1VhYsyVnC2ObJstFiktWJ54XV9n7wC7lGUcU0R/PP48+C2d9Ctsg+S8WSlHMVzcjrD85vaB3LOm61NrFsDhb9s+RpgoUwkhfptAFqOaFaNfV4RvW1MStpydS3FsNdwvK6WA/8KvwqosTx5MFRIeIT1QVBKZ0PnvCnIRfbna326Dvz7AVFrR8nLAcEBBt2sZvwU1FAe8xXFWCAxIMxgS53tDDipDNi6L4C+fO7HE7ls6cevelUf33nqG3bfy6Bn3w0v/4T8svXVw6cSJJffD9fCkmHmmkqTeM3xjMF9xIe8yLvQMwb8J4Pd3aab7rBUEDnIHkZvdjk8Y5JCeqDqtdA0LwNsC9f3gQK+xub02ytnIyfB+/gfZUSNbVi68pIwfKQ66H0ZOO/8F8hdweWDlQlHT6tYoglYB/oY1dsIak1rN+aKL66W2tjlvdQJ+Om33CgwtuLWWRBcFq6hb1Cq3o1oRagJ47ufshO1NsV/Td8lqNKrKu/SV79jeFPuVc+QXuMC4qCwVq/uLS4rIV3kUzAbeyDJ7mIpaw2UzdQbMGHj/uM4BRCJGIzL6hfmKW0Y8u0GVgLMIOA2AVIKvaMluiFFE8AbamulBDatDGXEVhuFCHTwUGEeCa55hSa3eRPH8ObXkwPXU3lsFTROAKyYpysmepQmEYHKJ7EHYPra3+h/KB1T16nL1xN5bqXwvOHClmcttHjEZzeR1ywdghfIVH5rLSV8rQODWqBIELvUBdD4Owy2kSTvybL7S3oWfbI+uKsFV1b+qCW061LQQWVBLpX5yH74iBXChrM/1nDwxIa+w7G76blIteMBWSPV0GGCuYCoZpIMfVtqqWbyburFBpIOmma3U3Js8Z7UAwtFPD+crLWlcYwsqx0F0ZP0ZQD9jmK0h0+UQgZpSgsy0prjXMZTtDpwbVcJpbpwvt5OXVh5hv08VuZ/clluQ1CgnyHuKVUMpygtRRYw9oYz7mjv8abLs+iRVt3Hgst2F6g5th6zx0ZDoCyckhqnXEzxowxGmEkMI222JCMAbEoEqRIp28D59EP62c1YCgAyBjKZWNQZqRYru9ZpDLJxURkaz7NcXshOzK/zcOFUfd3oWxWkgQnHluqnt1cKcYXyBlOrwrTIH7NWYGaqxKhk34jKjoG0Ed6X9rBVGJHNWLyzFC3qkl4afvYztuVjhdsB1l2H2hqxAGtxfb9hsAQnIxEJ4YMcPgHZwYZo81P+yuQQ8s6I0zg6BNNAr54ZzrvtYXyJa/UmUD7CUafx8mCQTHYGVRwtgOz1Hj4jTK9+gXuu/hXle6KjeQvnn14muRDz0r3yyQxJJUpyZaYyJ0qCDdjOVRE0HpTWr271sedvyeVPULP+qIqppIW+Lii6a2c0hx1ttcAjxUgqugovgKCagBHo+qxocOKmBGkU9JJ4bSe3QcsPkvkJOm08VP3LNyqMHj9o6/emnz5BzB4eTXexuGvqZ6Y7CNdXEgZtuOkCWz5BfbOSZcdu2oEpy2IaalzWeAWaJgOAm8mhhzGbO4oCDOM3hnEidrUFLikQJ1ThnTHXJaqmofVgDT2xlUh2ji3Q9ywZwcecfsKWYfWD8fjKJ+RueuF1f9xRgVUUmV7PsZl6zRIw1R9bFmn21I8t4W+seeg+W/yL+wN2rTkCdP7CFfWGDm9DSSd0EhiUm4DsM8WEMoCo2eGIgCVYKgctrZhwzBKclGzgJjDowBnholn4Jt+xScBETdP2d4LIlPVSH/FgZrwuQ68LmjY4ce/X6oNiBhjCPM/d6gl4/0IiJZGr+DQ/f2wxqkKcrk8Gdf5xVRdeusMpny6zauSKzr6R72AkVIpwLj4uKa5eajbP5QHhaVbRYNVVtj2ZldRblk1cdHmW97pfdd4EfmWQ60JOk6EpoVshN2bPGfw1eY6jhDKyeS0YeQ4ei/pg9Cr4E2AmN/MI5sH38OtgAqcVmDEts+AC2plUf7nFWTLOvrMgplR3P8n0R1y6xj1V6Ljwe7u9QJy/I2Sj5OflpdFBRp8OBlb/n+9Wsyq/8OMDP1sleljFQXxdRe+QAMvQcRzVz4KzZlbeG0BLlK0MDqBGHQqARS2h+mnKg+5KGHTTZmMc4jkb+TaSWCUINSAqyvdaIbUptVTjSzqbDUirVzX8No1F3MBFd+QnC725rj7Ddh1fOh/vbs6M/HFfAxqoQXfxYKvDk77lEPHI/l0h0J25OCYn2SFX9jxgdfTHZlYhx5KVdS9VpLjF54TvK5LiqlEqMk4tk3M8BnHPMXuZPmcoM8vy4bi0QNKzmVZrlJVRlDrLLlfQgwpmW0DTYaZIteWtHy7K5g7OuBE3ZCoetHMYnNM2I6ZIdDHWEzCtDlZ6ZBQPsQ2vY3GqYfMgcByuxMBOip1eFrNaYbTwCBtVW4ywISxdL43U9P07AUAyhtGAuxI4qMbOyJlM1Kw5sja8DbNH5RRBAsccb+528cPP8vWpRaHNHZVFWOLY9vXf4R/r7O6P9OcUAux2ZuGOhUpgr3HZrm6Z8fKpwVJYPF+Zu2in/nQdsvSJz7AFljCwSY+a2fYVAuqhWOxKG1tU7PJFytavzkpaI6NJWXUkUCypXSHvj2qk7Ljwy9xEjN6UoUrZ49Sc+mCgNdSsFPUDM4l7A/WuA+5cA951MN/M1psIj7oM6qBwzrFspzE7mqWMgaFYPqPbhjifKH/+1xsRUf9BkOJM8ZUWDb5rdTz3xveO//rh9Oc2ZoaesJvebpu8pD5ydCqdDEdWMcqci0e6IeiqFr3i9C6+7mG8xpMkXiqa7B5x/ZDJAL4Uj0VTX2mX8Z052oOVzVAmJx7xNdrQvUMTLQBEiuMRz5PMBNacP+Mm9LGnvVrVh/67qrgV/QVOFBNlHph5yH/HcqExMKOf/rNmX7Oie6v3tb6WtQiLZTJ5j1TrbHYYIZwuzz4kfIoCQlGZ1wdsWmqsnpkKtX8RHMRWhnGf25K1WuODJW33IkjwwmA84LRWBg1bD7ArBqbklbHoMDC+EfBiDPkzABVlRQvd8aIAVhcLq0Tl2/CcvFBbVQso/cevDh6r3k2M3fSJa+MC2+iOv8XvmpX1f3a7s2fch4/BDNxlnrrt14tpt4pnrPzZx7azYkItWmUoW4RHREwfTiYAMUUA6wIpgWtkKidR/tRVIBPAtoChQbQkaxBUEHRLnI12uuusZzBmdS6afLHz2BNnPSenwtFh9TFDS8bZKlE+EvxFMClmRLDh3vnzrfbknkykXP3PNODl5wz5/u5wqap6w2Fn9c2VaU8el6kNpKez2J/D6gWvJfyx8uMEn6QJIxphKZy1iSmOhwszrdmA3RKNOJ4uuOOlTCpoXyzhR2ykvkZC4FtrZSTmEDsGRQHZZhL0whKC5VAJm4tAufX5OI0u33V34Zror3flfCn92W/Xryjh5UBaUrkTwNMd38o9xAGlPgkam6NUcvq76xYkPby8fHal++qZF7SFvWEiRj4hjmcJslnxA6OFc9fFHB7O1jt/CGg1Dmh1+S67yW3O+EqEZxwgPIZQHgsBIENR/pxO11ocYDQfnXJ+xc/0ki7au+rwdpXoNO3ygUZETnK6tqZ0ZZSpx1A7r1pPYZD2eZtVZTIfjqW5cjG1mVpfyOxrj+PDLj3iepyv5OzxZYcHPqFvHCPrROuJGgEXImpV1UIRrMepdaHCSLc2HOQlT46w+btns06xRuCj1AfnDhqmFzJDBOJreYXG7nlTjcKr4QQrLpMYjjnuNxYTWdiX1Rvn2wySCS/+tmk13Jl7VQq1dIyrZVtz9Axo/P3D6C9WH5z5aKPeSBZbJLUzPSKSwUEb4XJzQXf1p6U92Vj+qFsWgPP1jmqk7+uDXhVzxRD3u02D/KynEfVRHt8ZHgzWzVa8FzSC0ZlPe7LC1D8TNGK4Jawmehki55hE6FBiEpbD78Kspuh+1KXAUvbsVk92N7+cfwFd294rZSIs0s81eF5W+GJW+iCN93VT6IFipxGgwF0sAj0Io747VZYBqa2xI+6znlIbEj+2YVZ+3k5sN2R/8eesgBcTJPdwKa5SYAlPpxjW2upcrrTTj3epuxiCGQLhZl3LAxFgC8CY3ZhiABcC8DxfW0FfnNi8gtiDkzB6b2oGHLZ2FBw+eWPrciNxOZolCU8b/I2uIQWmH+0t49tY9pT2FvZPZef0A05D76cXMXQ/SuENH4gaAuBJdXpoS18qg5nL3hMKWrwtrYquEXUsbNq9mv2VST91jYSWRLaTCK2X2u9F0ISsUEiuP1dG5qrBhLoEeN7fy6MqjXH9KnVDDLFuVG+ndhrlhqpd8TrqAqyGwlszBLFSoljZryFHbS6GaxkMzz+fPr9cxaeYqh8+bdZMAAzUwOHB3HEjkpDEDdiaARsfxDhBo1jA5TLWYgbDpBmNLUoAqV6uNKiFJVnPkoqvm/bqcfNE5wpw/Txjq3X5PHStq33c7eqj6JXLd+Syu1v231VcFbdcuTSDCW9sdvPy+6n6FxsZTTv6ila67GdbdTtftpC086AUEl2kmxROGdbFBrNeBgglXXG2c4SySiHqkhjRSWF1cGxtn3TQbUX1jZbm2tLck93GKxqz7DPvWl3FF9bYR42JnVdTK5xwrP1KvItE7CQISISi2+jphXbEmXFcOTL8VZIw6499oG21LX6QOANwbXrORcI9+5Fwi9SPp9qWl26UzqXap69vSyX37TkpPpqUzEe4ZP3h1Kf8zXLid/5tAQhDaA3/Lt7v4qWvHyBfnDh6cq15f+vDW+RsnqnfPHzw4T26buHFeGROrJ/mMHCd3iWOKvi1LjickKVG9L7utMU8RB0kaYipRpAZnZ+56HUtli1OIxktmiMOokGbCM2s2qiG3S9EfEcAHoAUxdMO+Nne0ONXVMVr65J7qBBLiDHk2awiBgGBkqwZQpWu4fPti9RcLt03OdFUDQBT2jYBoqCStGmJr/Tq3gB07yFR6cZ1dutVPFWilvxelqL8I+mk76Hlc9RV01Vj+Vzhr2iYYZlgW4XBaCYVP+2Lp3mgvD3Tr7wU56DbM7SErWjbsGMYJ/mgUQ2u+VFcEWZXItsdM6Qg0pAViWlnrYtOkSKuAGaQmCbpi53bvIV9VForGNVslTh7Pfly/TZuIS7nk6zvuVhfHjm5XE2f8Iie0mgV/pKykpfaQP6GJatznE8KJYPVwsof3EZ5tP/blOXJYzCnbrzFWflI6uLhLvu5kIS9keN8Tt0jigra/lBiItnz5bl7nFSMhafExOZXNjWmkmjAS/uqf8xlVF+vx2A168zKm0kXzUrrZgWaRugYDDtU1ir8kIE3Im0kO1TvV+OE85mktOQm8ngBxNH0hM2Y4jIBdJhRJdRpVrGMIiJxthrDKx/cXi/tuLX+bnOHEspoGFfpfNYczosNqV6c6FK8WgTOUy26auW/uI/PSylHeSKkFod0lr3iBQ1y/c4d60veBp9tUpwunsTdgHKW3GexW8zit1LqAL/ppPaDST8ss/TQOnqFxcDyPCtHMgRmmdRUMjEfgAgQj2DzQ5gVAQzrKd38zHMZHHPmmDBHXhVFiCzEtsBZtb4ivgV/A8kEfsb1+ihQIVRxHaKSQ1TWVfNsb57muppUpQTyqLuRIpfShrFLUi9qQrlUXfIloKOFln0oryrarC9Xx0rWaMkKY3PykosVZfyCQ8bvuVuYLd2xL+Tpl8cZCbnZYLSQ9gUAw7b/wcWXnsLFUSiVl8Uij3exALddGfSPN9OtIc5NwVnvTsunN17xlLKvGOCsMaAjAYYCzmuHQBbLf6WQmHWkvk9USgugkQly/QWr+ANXvs3jkEUm8+gsso86ffxMVsKdpHs6YhnpT1uZIq8X21CJ6Lb3r+Bq1spe0lhilvkXcLs7Uuxo1LKP5HN1G9s8auJSOocLJheojCycLepLsd5+wfYslw1iqHc/dMlrKZkvG8UZ8UV8S89C4rqC+ruzix2S6Y1X9PtrsBk5HAg6ajbp1NpO6JdrJI2QbukaSJVlcodtXvY3bomkyV73N53HfT2aoq/E3F94A8zBHj5+MKpELSVnXZddr4b7GdY4wS0xlENcp6ygCZhTzEOAc1bx8Z8VYgcHgI2J7B12wePTxIy3A4mo/cnvzICxfNUx3yGyrB4LXi5scYi+M0/8iUj9vgNVqoI3sLSIHFOENAPTFtgf4pNTxnwrlFre/PPxlOOYDc9FmorkfoTTYf+gQe5c2P6+tnDx0qHZNSXffzneGvEKxKHhDnfztQhfTUAvpdXo1BN1ssVkHRB77M6wWUPdWm2TYkaudc6TL5ps3dQKbnTpym58crT7gbxuX9SwKb5rP6nI56K8+QI76g2W8Wv1J9Z/x6vhBXuTY4+wtXG9cKU5IVZ4sSxNFhe8JrXxm5T5O5PEq+UU1Dlfr151kZpzskcNXnfVU6nCKqtE1FkPrG+2gnAUsxtdYrNa91kxqR6uNHA3sVT2Krx72x4jVe6u3kbvvxaMfr/xm5WYarXyWWVd373d8Vyx1uTSr2a6M0zq4FcAUITHgolMx0gukFo/Eap1059h/XLmHBiH3rQjsbejJ3ul+HcOOu95K2L4s21DzmbIxQis+bXkzTW2T14mO1rywlF3gqbTRjpA2rJz782vh2zi7SUw0wNLqTkvniMr+Mrcwn6t+mtyM7ysJzC+eufHGezxpBcLKrIFRUXa0qPlTxZsaa/e0F4FWdFz1vQi2TeDrTN8AJj5kCAmqXLIsy2rkwq/9bWDSylrX+VcThZRSlAXPVk7aCH+iFh120uiwqyE67MSOgM76jgAHG5G18LUxNHTcGDs5A/CDmTlWvTc3v5BjX1eLKX9QKKor7bl59ts33HDEGMDA0MgGxaJy/id4W3sIEECIm+xyf8f9CubuyWp2nN8gN8TNB8hCWNVySowsBKIFUc7Eqq9U/ym6RREL5JEkGK6TII3Syl281iHpcif5WnVvKqMjjpnqE57v//5uxgXRAbIb417GHwLigeEAgBYTYoLn++fLt53BWvlN7sdcD9N8Yw/tA/ZgpSdC2aSFW7aigJUWZFIPuigkg62wvMdZsSxlyE0sl1biCY7cynO6zMWqt8mex3lNave/GJBi0rT/6SitL8GL+/vu3aBf55nr7UyKqejWOFk2t0GIwGIHNMQp8OU76ZcbLcumwVmT4E/05y0Rxbn7bMjqaV62dsGaDIam0sB5OtWmDU6AG2r1TIKWUlRUveM63O03Vutt2Jw6wFKlWnD4GvsOI1EnjVtsCrI9TmxdpIF3kToePUE2RhhwJo5NkUfb5Onhf+U1uQO7bElw14lSqjvii5FoPC9PsHdHE4mOxJNT1w2XlWc6gFVfeml0sfqP0QG5gxSX5g7lsqlscUYKeGOykM7w3rSR0ovj0sq1bpcs9BrKNn+rN5HVb1YTXWHvzeDbNoXFjhrePK+BZZ9ndjAVwcFbAfA2rVkcwYaSGs4yLctWy0A+b2Y4awyzCi0UWYxVEAAfkmFx0yG7yCCFnKZm2sSGZQTsEHCsEM0yaDaJB9hIlN6Dz2A3IfgIGslgIQI/CMjx8nJXWo439eQWZl6SZ3tnSoODpRnxCum50j4lK48hrM9E5WNhhXtQji9xzcl90eQ90QHujkTPPe4XEjk5HpdzieqHenJjctrQP3RZ9WMLh3QjpZRlNaDtSWTy5DpNFw5yQnguWE6R/eXYLBcOfTQ6lEX+rfFVGbwfOz8nA07aNQjUgZfGKV66AQ8Ttfor7YqsZY+pSFNQwO92uiTWblAT7CKMP5kVPycWRydUUkzkpERSzsWqj6aMjhN8Vxd/Iml0kn3RvJxMAGNUf6hOjBbh49mkn/zwO9nZ0kjnbamuEIuIEuSYt4M/HM50/ibVGznMdzRFbW4AIUrdliqWZtdkBWiuQYSxw7HK3bpVBMBmNTBkyzSJtEBhGwQ5GeQsEXX5eD5vJQHWy5HmRTDaZq9h+WfhHR2Q1Y5Qm9xrHEA718EFbapRnoZmdUSHqCPTSHV/UklPa7vHv6HvKwg1FmiKy+mSrGoHs9/NHeSny4PP+OJjYSn8aaV4jO8R48eKyqfhdIxvIofIp+VyQUsaSqo43EP+osYGb6mJXCaxmAuoqqFHDP3QV5R9YY3jcwfDcup3qUzkYC4e0sL7lAadUrLxlEPqS4RWSsZYiivKBDaiugBRY3mzi8OmTouHMzWPmLLKXVQ4sCyXMeo6Z120CIdooDEZtrFfhEMioF4o2hrkQuqaFQu5XPq0VMxrnbtnxJbOYXXlU2F/LjqeJ3+9ykjZdL8s83tSGd7/DGu4YzvDw/xfp7TEdJgn+8lJeWJET5bS3W1ub1snP1G4bfEhsLTBqaDgH+ZbEedCJubFrt35ZDZXIuqJVDY8xfm8XC7Yo9Iey0MOP41hfzxiCbMxfTrYA1q7SGhWKwt4Kmvm8FmIXqz+FiwqVfqHaVIAQj0I+MA7qAz344Vh7H4Zdwr+WKpcre/baKFp7JQd+9PTkLM1AouRAyw5BGLSPtI5NXv/vrsSupLkge5fzs1psW/UUPINL0AFHOUd4QfkpOvXKCEde/5k60wX1i/xRmvvTEGuSdSFC8A0PJ/Jt7vcoF7tfgameoDyxiRzgLmawWaXLEA7qlnb4W2vZvkI9oIR82rKHFsB4q2cNYT5sstBioA9rINwshXNzBbDHAqZWeAQOy7ZPgoXC4bl20vLanbOdk2wnFxGrXPZRdnEMTvwsWHaGdwgaHFM9K4JGuUjh42k9P3pgvwd5cBoLqcLUhSETEpvFQojE0r1CcQOIpNcn87GcylFXFLOpeeyJ9XwMz5uMSp9Nqymvuhv8bd8MaWGPytFFzkfeZyos8fajyXihawc12YScq79wsTMVWPZZDHZHfHWzFN7LJsqkKAilsPKTcqevWkjOBWGoMEvRj8bFf0QSYSngkaa+rqr+mqEWWQqQ8hfad1U16yTHThpLdjchTUR7Kbq8C+bElr0RLMdOSUwiZQG9KpDcNBOs6qbmyow3XykxlO0PNbT5Kkx2ZpF+kt5b+5PUofLAgQWbMyDmraX90VZV1RV9qXT1X9E2UFY73a/uGqG5q5LKJFCqrR1Xl75s2ReTfKZwXb2gDie7Qg/vvJ3DqMBfx0EmA+B36RAXPsBpiKh7kF5SuRNnwYR/7JZ1KwB7zLtmPCeRVts5vOVBG0gS6RBmrwJPPRiG2KCs/rasE5U6aMX+xinnQJb41HEqOQU1hoD9HoVFCms7q6g/U3kIDLFV75SY49/UEe62x7A/UEdqG8CeP27unJM0Ye2wMshRBb7gxrlwV1XL1RregWuesoHCrJcwBeEG+QK4daYCeZDDJa2UJI4DUKtZdAg1hCCPEkJ7gGQPZwFzG4JcDiSr4DOAuiCMQBZ4KxBAHlQs7bC/UEP0Bz+quXDGpmMxLcYFwacHpQmnpqicUeDOLJERcy7tmmEbEDDqLwQ50aKd2o5nv01r2WSuHmKCKg+o2PpUqmYeEQ5qKmz5KUh5WZF1+Fl6CFlZKGYjMqTqut7DShhFz85KfSE2IgkfMy7Zw0ldfyfxVqKYmdWsUSBvD9AUdFLeR/7ZBmLw2g60GM08vbm1ZSm2Aa2Jt9LbhOVUTlZ/ST5h5QyqqS28NXI4ibMvCKTk7wxtkVU+Ooz1Tt4VVZKaY58Zf58jY1h7ZSPYe0K0HMDF6NV6Kux7ya8y9g7TtR3yqnvhDMpO7r3e1FeQdMj7t+6vo4d63y+y5nbmMpOWpMd1nVzq2b261arZ9nyxrHJfjdF/SygfpZDabJycJjjMO9udYL6kVH9JEH9XAEXZhmaCTBLIeyUyIVNzjDlkBk3rGQGM7UCxhWtW+GwmasjXdzZywRvLsqndZoJty+J6BCsGcANlwjj45UuSWvh5JJuvF/k+B4pKxwZl3x1KqspHOMHAkqNxL5YmEsEllYp7hpPDsoJVQykJB18JQhKdmv7R1f2rqqvewKSwBfasit31gwl+/mA0Bnj/btXL9X70gbq8YLtdWISKETspOboqscJenzQrnQnAZEZRGQHIBKR3CHRYgBj9RdoHs8MhaiRXOX1FPsO9XgEIjA5Cnp8j/Z5Y3d2vR5v7hjKbm3Q465isqAkEorewbtBjwvyBj2enVTCjXq8BjPuHnQqoVYe4N2qWS2ktnuQekT9HK1XoWuwY22LVdHxE3lnr5KtjwZYecCFdSqquNA9amzhAsseSOYkyRjboX9Fny+NSlKuo7Wta0iWjdKU9hVt65ghy3o6+EynKhThfKRbTaXsw6KgdpKbyC25WSPflVZw95OSTueM2Vz1M7nZsYKAVQ0fL3cLhbFt+XROSrW3p6RcmtyydtzoI+nMlQA9ViwkDWhI9wNyDs33UPj7AOjmIYgs++xaEEYZV6EyKyG1FYgsd8G7vxZl0PyZjZm17r+1yLJG47XQctiJLTd40cADpS1yWMvlYneLe5UTaq6jqakjp55ILyl3TV2uyTXiPxPgHuT7InpUaHuAD4f5B4I9UZ3PcifT7dXX3C8lwdHcnUuInCIlxrr2i6MTC/rzhV2TJeFAYmIuK1U/lhiUeXBF2XP8QNt9fHc8cDKa6STNqd7YJwK8wt2a6hPqcaYxO2uxGQ3Gu7RabBYBrO3aEJuVwavEePwyGo+/TWxW70LaiqPRZeQ38xhttvInlK4ZbXf5sdwHtaxcqsVliCJR2bv1f59Y0GbK2WfUHn3ohNCbOsb3SvFjKan7hD4k9jXEZVk1kFtE//CtLgc37eSxHmUmpUBctiDlOtUO/mBYFH4r9kQOJtrVVK63TofkmGm71wtd7yBlpoqIu3AYMYG1ozzF0JYWbN8xt3BYELGiLXYnsSVmHW6S6rgJccM7FSBaGKqJ0zqdUdryZWVJe+j4ZbktEF6nC5o7FN4qjqb6ktVfr1MVi7ndd4i5hdyN02Az23doCTme9LXzP60GV7VivV6cYk4wlTLtQyDLFV8ZofFhbSxL3R9iTmtm7KyVB1uZx3YTJi/CzbztAhlwNWjQDfbo3c3ApXzMbggKhqxQwTBMI2wOg+LM+kLhSixjYMdoR4hupZEcL0inVWEAXRogq27QarEMELJWLHOSdHYVhzBlRRWSezTiTxq59ExPNbe4T93xoSLZrZT0wc5UrqSkpHCiqFRf4CSRT/Pklwev+dZ91R8vHCumyiDhPakgG86qosY9L9140Lh6QnS3dfD8gKKMxqLJgC+eSMT9/6TeecOD94dVvlgXFzwMnHDEtifg+S9XeguIhF4VUDOhmSk7DA3nK54J9Ck8AaeyWKahaLqFbtlJl2n3Le5fLNP9LmV0PdKctQXQOBBYxkpjXTxa27C/FqnX2mnWtmzWmmlcTljKoHM4WYs8ybztleSj1cfZREG/tjTO+XVJGVMThU9fdu38/zSc6gywk2vx6Q9rMvLDWli68nNlKhvvGBP7DUU5kJrqUYz05PScwsbtILXe3h5y4vKMTo2tRzOTes3e+sHCjqCFDcCBn8NkOaYuwKWm9naEsZtQ/CHTY1ixAI1JGSuUA1cFvtowPSFzxLBxQ5VKBJwUqnSLde5nJ7E7h1ezQIAYmTDuWAbi7XBzlPW2BqbFKaGTrKZ7QoqMgD+sLSqfU/bnwDy7Xa4nQaySCVlrX3lEnI2DIn6cHath5sL/welZIQHuh3BdWkwrYJ3nlHo8bMGJGN1OLSes13pc/S0Ubuy8iQPQfbQhqdspmNR0pV25cZQFrQ46dpgg96sFAV3nTpKC1XcX+lv91Ze90WQ6fEc4nYw2Vf+7v9W1cK82l1T05OGV4+x9h9FgzGn3JoT4yu2cIieT8pYQ+0m+u36948ytTGUE1zugI80EWPLEKs3GkWYtNs1a7WwsBnqo6GS4msTbW8BpmoQL46tEtDxjhmElWuFcN6wt2Bwj0Jy2ZwTDBt1oICVfXGN2vhihxzywd6zFKSZqDj1xXzUlJzjV0eZo+cYaFW8Yj/pictdEmIsd9LXG08mdSSV44w3Bvo5dyS4+4LvG9f1EnjpV7VX3t751GhVlu5xvP/2tb5ELeCe7ZcDjWXml+gqf7eHV6MMPR1W+J8sTsVF3vsP6otRYX0xuGha1OHUSBqKZbPV53KyeHe84fz5Zziqj6RB26XHdo0q2nLSvGUdSCk8Ok8O80qlMzgnVM6BI5yZp5PSV6ld4JaWUZ7vJUPVHwrYyrtmx8aPMHGMOa1RB8RoIJzFLuCkZp2SkgJopzuoG4oFzSNPtqRAQLWiY3aGKt7WJTkbgPXSDWE0zReh+fxcdiFAjG9HrFFYd49oK6e7P+9MizwXeiCZXA0CfSry1k2auynHJnoHuL6Eqqj6NEkmywaTczvLZeXVvTfaOrTzJzhyrne2WisJbPxQVO6BqoJPCdDpxYIJmb9ARxCCwFuRhso/UZbQcaWvIiWJ+mH105V9rYR57x65RXlw5ym6rZfhWlvRSyntcF8V29u5amJ0b3prKCSufrgV70bTSWEvVmWud/ZFddmeZq25/5BBEf2exYbGLbt2vdGGykunqATsBxqWf7uTsR8tbwHJ9P9ClA1vOumilyHSF4NSMY7+8MwrG7ocornbn0sYsul91rUEUO5fAaUVBOzeuPLpYCAjykkF4u1dU1DTR2Qy/bCzJQqCw+Ki9HX78cjKjzchaJ+03/tzUzZp+01T1C1jLTWnytEZmdpft/T7sySrvmvPeSet5WMRD7YINJPjjccIQPcSePFPlfTf824Mb8ZWrVUIz9v6BVs2KrLapY1Kij850qfTRdtk+wFfF3Ue3+DK0c5biq8/tbCXIYKG6r7aVoBWRuLrRd7iI6Fi/YTnubNpEV62utYT21iKGnI3VceN9DoYAX4DJ1m55abT6C3vL70emPjqk3TxFbkJ8dWryjFZ9cjc2Mw+Wd1ef1KZlQBvujWKDnoAbp2S8n8HpRS2uZdw/QjcL9tl5GIC11/bH4oBAFdvaesHbam7qpPLa0gEnnb1b0PUSQqd8wZSIs07c4UpTW8SojYQBiJy4RUZQh2spJ8cRxzPRm3l8/8Jj+yZ/Ge1u35UgA0ZRw/OJ16PpxM5E1igOss9WFg5P/CLKJ+7IFVg9V1m4dnI5yrffkRtmhxpmRXH2rCi6Jy+pWVFMsdmzokJ5y9+GfYVWe21WVDIYwkZUENWI3YDHR+I0HwYr53WcHSWLPeyixMoTaSXezEru1NR1Ux1ue3rUl9jvFBaikpZcmZpfWPBsHb6VfAx+bB1hMI+476E5zz2MKVPfLe5ershx5By5hzY3W27ksbzZrNVwHkd5pMkC3JiCXcUBcOgk6tB1wO+EagkkErInL9ntF3pj74G6uncMNb8xrtijNGgX/0/ZFL6/jPLzsjLOHmFD9VODqt/GG/Z5uV4+Bpl7mMqAIx+WO5OnA6c8Eg6cggutqTwtjoSQf0Db5J19SLf8Ookbjkz3QNAMPuUBmXgzaHY+5THd3CmPOxhRT7Xiq5nhTqUynXAq4auLsYKdAwPkW25Pa7AzJWXWbS1C2CM14YnYkaAjNk2umspxNTSnn7y/+lsqPNMPhf/kyDziYFIRfbeRVqp0/uY+8kJdtzr5Jd1YLE1dhlKkJqsHKHJiduc6xrYsSbqf9uxlJsBj/zy1fJPscmV4klZ9ykCqgTwWnWNwMTZNm+uDcDGVp/6656w16VuueOinPag7WvLmJEfTuxm4kdlK91ardHIX7QycBON4yuULG1i9z2yFk4S4JU87SieHcRqTCzyh2DR2nou22zOBO9qGinKmNonFSSTVvPo2EudD0SY+XpvF4viy9uY4ArxE2ORHA4GPJksKn43eGExx57lU2w3RgbgylrwpQFpvSo4pfH/shmAqBHeCN0azvFIi80StvkBOit2fkkEb6so9gqgUo4k7Wfh3ZyJaVEThHkWvvlCQPyX0NNwhCrmd6uSf0f1uBSaLMwnSKMm92FUGmtXOGAxoZs9Z9Os77W39nT2Irk7cYdOWr/TQbpUemQ5doOMWOntsjTyYC4+zxWG7FYvvYqNNJLbJdBbKVQXyM9IWby3Mx8Hp0Pn5QoAP+qq3rh/YQnc93Op5QlXS7nCXsvIrNqKkI+60onIre5T64QX4Gwr7ddRVa3aqiUmBpfJppouOlmF9GPtbTaBum20x10NiglCbdeYMufvCZ91vuo5duB/5D/yuN6jdKoLGw77pFg07x+nmaatFAk4oFGucgEwwQTAsjtjkBlcXyA88wFNOwP4Ul80oaVIkmSK8EHZvZYe07ZnC6NTgj4XJ3qzyzT9jSxNk7zd3SbN/B1dz/02YkLLK6QdXnpn4r+Qvvl095PLtnr3/gKbNj/5ltlStyrKwVX/1xMrYwuzubZ/fD9eNh7NjhJUzwpT+TyfYZxbKVfZBUqXydJP7O+5ZgAf3B2u4P9hM6Ja7ifYAu5uW1/Wq1YzS2hwYJ5bBgXINZ7YdzBpGlvUjOXAkiad0R2F+x/Ad2sKCtnrEsMwbwHcXYA3jzA2YvaB7eZvBszusWfvhbUGzZql3a20Bqea3IJvxKQzBb9TMibPWVeDmXmX3jQ62LFfacBcs08bYQvwRTGxdBVSZP4jG83AzGE8v04rGcz/dErEQNidWm32d9MXqblbsvLjUblbqX7kia6VVRxu22QkOxwI7V2kS7A1Dyamx1PuGyA3OJtdC9ULdLtfwxP+8sEx3uQYHlY9PVb+0cMdkWBHjExGuoN11/Ulh64R4a0FOdIYj4bYOPlc8hlfuPvynSjYcI1FlaErSw+9kz2u6EMwOF9l47v3dRw8sqsXCQFwzpBFZ0DtHtA51pJDdu7RfOoA8UmIr7j3UFo0z1zCmqpm9ujUEJClpVhOhXVE8lmHsuNKpYPgA8d0QQw5jDCkE7Bgyt9oSZbUVQHN2ow7tzSBlhlS4lblIP9Swk4uPgZ8AMrO2y6iIvhs2QlHXjZRELXt1gej+RFZ8Mtrfm1jQnp/4kJ7oDDZxbDY3Fz8qaqmbC3sHdOkZg3/4zyX9JwnD9cRkaZ8iJ4KSmvB6o5JQltv1hKrp6ZXfKbN7i1woIaqHpGRwd7ggcXZemrmfuceT8PpBBxgMQ2fwbV4dGyDSpW7eH4oTM9wvZHMRrmqQZ7lILiuokepuniO/te91Z/O1e/ms0EfvubjjabmD/IbvLEiJ3tjK6yu/jEoJqZCKk98k5a5L3QQ9/yC5x+N2H2diQFFngEIl4qK7E4MoVpeYahXZdHzCg2XFdV9KjifoHsULzyhld6A46OV5rbvK0Algj2v/LjOt1nTJDLPI/C9Oj+kA8OiiRhN7i3QTySKOoRvTLB/okzEfXhmbQsCvRANHw+ZteYycd2JYAWd9dtsFB9pliEOMDCFG9sClnSk6SsDso80XQ2FzAFh5cSAUPt2ZTea32TMGN1MdlH+djvpCbVeFtymib6p98LK9sUIlb2zUEvGp+e7qr9LZwiFyqHjtruyxxZ+kN2qX//GhqKamkkou/iGPtIlGUBXyMEQq2gHXGWnm0MSHj348Vj21XpWsPOkOCZ17U0LYS/3tY560e9HzGtCUt6dLkGX8QWpuTrxjmsbKWjarrbykaZ5PFlVQPY5vd4A94z5M5862Mf2M6ddwpipqFxdqF3s/nbNHAZNVaK5DNa8cvgIwC9+AE1PIgX8hpddeqz7z2o+wu9v1dfKNV1+tLr76OOvsh/ob98uex2DNWey7sVeNak3Q0ZHGSFMNIVeoGYg0QyoehuLIIOABKWfRNIp0o1FFVPCe2ATs1JWvKCKeKWh5gnYhfdPBGpcaUJeddEWncrmpC69PDFxsWB1JSeWyJE1Osq8UNdJMtwv8G43S36IujwdkjRXdj1GdTXtmOc3yXqRn1mvYJCpKNEXZ5G3y4GpYkePJx7gEr6Q51i1Xb4uGZN0TjmYCL/rbJQ0c06f9M+gzvlQ94Dnu3s2MYccs3ZMAtgFrKV157ODyaGa7Ttu2Smetgl2VZdAiYPaxQLed4HjbrpZlbNeySnU5xhGwD+ECzTFCWDIIdlvVh+z4ti5NvC5HDIiltrY+S+xsW5FDL7ljcg+misPuxfHiWp6Y957Malr2zsK8GsFUcceuxZS7rEhFti5X/MqBTzYkii+Mz5dT2XLafV1a1ITqneXh3Bj5KfWjn1vdgz9VPzXC8mCQlgaX+iw2/Fc6osguHcguUXuLLY6p6UY/MsKDXUx21vaprXaS2Ltv6hjmuZLqEmj7NjDKaer3PqKW7NFAtLf7O/Y2HHs7Dnt+nM79Yw+4vu568d9l7h/7k4vO/SOvVw+4nmaiIO+DVNpZUMesH5HCulHaAuifW97m5YqLtnW4UOu2OkqlqBd0e1gSef2I+d3Z8V8eqX7nAPm36jMTY6BLlsBnOUn3jGxHXdIDoTFrV8zZtYq5f61i7v+jVMyX/LzSldJy4+o96nhO60wrvN+fVIV0TivK98hFLd8lqEn/98NpPpO6ByxmOlx36HqNCIqRVzsSQtzvjwuJZF/eUKqvKoauJRPdEZ8vIrQnNd1QwumOaIiLJbvCRMDqQCgUTXZFULc9Bn6JXvNL1u2EIQ7R7NS0dKmbj4VD5AfVUdsdCROLb+Pi1cvDKjgq5LeN90ye4/jqbnrvpwkpysbYaDTTLhU6+WogmUkfT2eS1QB1Ri5xE2eCRRnG8x06T6GPmWeeZSqzKDvzmqUDY+jzyAK6huMT9BFs6tGsCNah8sjC1ELs1MxoraXrNNiQFjedqufhTjV7moPqaY5jOt249fV0s33k4Wh6TYff0DmkvzmUt6bhrJSvTO/A75ueAJbDZn5PFDtstoBO0lXaBGjuCJk9oJnmZ50bph6yxqbgA3EcZdJD87VpozaUVF+NAgq1wRqRoVW3sEaSmmnQa7GUva+4llaKjsskHpHLZfl1fIktyuP/T4T9BqfE5Slu5QpO4+Uye7tqlDI3K6MlOZXpTaNj73mxqK6MK0WjXy0afaSqvLU1lXYfTsYNJdH51p+n2os3siz+wer3fo2m5g1/VhSz/h9qhYL2baBLAujyoEOXy5nvO3MY5wD52zUwc3S02AhI1whnRkC3mx4dpHR5lSy73xtZzELemoNfmuPoZtRJONyVp31Qa7SYc2gxaNOCnm7BTb5mwrAiecyachBnAE1G3itNPKGGoeuNqs+Zsi4myusJU36TEoaXt3Iri9xgXB5nP7X78gd/jLd/J+Q60pE2ITUgfunH8vi4/PYEepzcu7D4JcUoqsFEsiy9LJZSieB/VkaLqkOf79D9vnnwev+WqSyg3IDHWwK5KS0iH5eKKDelSXRUbHfHu+pdxZBIV9JUe2ve6gAn192xmlwP4/zMZjjo4LDvwSqhdHBIBnMsb+2Es+l8ZecV+B07tztOcQdm4gcNq6TbjZJXhMw+dIsXsFA4aGADmzUzD1RpC9iZ+lgIPrZhvP0aymtT8d69xCTKynPHkKePPUfTjFNXLG69oJR/Ggbi9IHUhIA4VGru2iA1rqjR91U4yFK0L25deXhqUa2y70JymHVzyibtqhV23eZcdtdt01lzIE9HGA7lK01tiMYmYjfWWm1NgJ0IIK4orc1qpEPJaokWOq6MXz8bl24IqZ9X5gm2x9g0eojuYCK88uq1rDesYn4/sfLP4UxnSoh/jY6svrqkIhBqiejHkj2J9gh54XZ0G76U7EpEQ1V55xJ5kktMqlIhXs2BbxjGaWaC+wmlVFKUiTKddf9LgPdF772gK/oZDWdrx53ZD2E6jqaSDSOMWS/a90HAA7W5w5m1qVX1I6ucsWurm7loT0lEcL3R2kTu4xTw2drIvf6tOMJqrjo75y9ovHK0rPj5ALmD78h2+yP+6qF0+HkifyEnht1JuWCIb70mbZ3qfeghaWvY61F3uL2P+OW4MuV2fyaovvUiuff/DxiK0iqJPPa1S8PwfDJO7gjwfmU80lU9BFAI2aMXgcHzJ3zG/4jXvUNNqcHPuN1TFw7XwfAgwDDI6OtgyAEMOQpDjsIwpDlPS7gEDDQ+4D3xGh08Trr6knCM5ohX17Qh4s3pUjDGVf/f6htcLCjpxHsxcO7Uk19Kpb6U1KWiu/muu3yekQuHAKCG5yjEmAEmx9zgPDNC1HHemAYwaTQ1qHU241hIs0233N5l05fHRi7UXVgYefPIU++jhZG2gaDJPQUu+Zse0/2Ui7E83MAAOeX2tHG1gocV0UDuck5BjfdQzKDqlyUKfPhi2AKsnBvR2Kf8Q4pSLmorE35dUcZbLoEoMgn48Nx+QJrw7ggXteIBabIJD87/chMcke9ShLhX8dEK9FWYImKEzsxI6ma3ZslY9uqmZS98WkqLZhbszO5AvjbqxMnq4qiTPI4ozVNf2MfQzj+zL3Q6mu6Wt2B1MY9ZDsZqkWkrZd1eZMoOl8JEY5KY7lPOGsbA22LD3sqMH61LG78lXQQf5NW1hPIqr7xIZ3ALjES6nDnc4Q5dxzaJuG71uJdNMY+1Vzr7JUN33WJdvovDids0FpOdatonf30lZZoOYBrpKYsJvWmSp5743s2/vtOe6tfLmdGnrKDrTbPtKTg5FeuNRlTPqTi+geE8xXdIEfWJsddfvxY+33KqHU9PJfDVc6oH3/CXRPx0Ba52f6r7U6I3GAobZrtRgb+1doGZ9DMk2BZr75WiibXJf2SyjV6O8+09It7qGGj8B+xMrC43zVVZLWna0sdYQo/T+VEktN0DwkyempH1RCwIETo4sHXv4mvk0GtkcS/x2zTbVZ3fhZMDp8goeaB6tJfM3Zs74voaf2zvkddeO7L3GH9hL9LpN7+BV/eXP3/hCXKucSaNChp23plChYNzJc3qd9FkPw74Dmr2nvBBzRTPmtm81cktW/5I3p5+HcxT3Wu1YbQ8oGG0PE4oJ9bqsasuXkhfzcHglKMgDnQhekF8zd1EXuVGNTvH8uyza6/VHytjj90VGDNS3eS+g77FbNQzmSusHwOnFckHq/eLpYBXYK/7DdZtqwcoXBM4wcZAaezX6ZAh0EHD7NpEwcn62U1F7BCEMHegiOI6oDSrlSKdWVocAl8Aq5PFDpxQImKi/N0OH8TNbeg9FTBkFt/lIMITs+XXjxwxc+9qHGH1pYmxgwfIT1fHEq7S+16mA3T3js0n+LlXJ9JcYoIfhgIRhjLypSf5kU1ch4tM91vxbvQZ3K9QIv8TTbo9hq9efp23sAGurX8YXG8LzwY34mLwfGSj/7ARHs+D6zyHOngeBHjyzM6Lw6O/HTxDDp2sJDj8bwfZ5s7FRaC78PzFvIpNYHxggzux6kecBBi3MMPMzReDEm3CkH467WVaISjNgtUsvg3Up5IRxqfS5HDEnquZAysyAu9iBFCRzrwtKi5RUb0YseM1O0lerRnXTRDxxFRhfr4whaXX1aN6/k2Dl7j5xEL36rzQt5tYWHhHEws38+kvOcXwCxul80hx0DVdm8t4gfbOaJ6fX0o+/13h2yiol4Lv/EZp3RS+D19KXtPg/11+UfhG3hF86PzFwEmwpBxl1LeH9CKCeylor7mY9G4K8+FLyW8aouoSc+NFoMaCjqGf7rXFFzPbY5rZfdbaAtK5xX6WydsgBOdiDcDHhkGIy++M9peS30th5ZGNQrwpPu7dVIzr/CkZuPwjTncsYmQLxciMjZFy3mzTzJJuxdAFma2lfBAjY/nKFoqJLVuxu5JGUpj3sZhwnm5+yWP3MCBiO50JhAPTUnlj3ZzgdzcweNU5w8nBhxAv72Z+8A34Czdgz9ivEDXkX97ZLOFqB6Kz0QftZUZxtjqdMMrrKCxDuqVA7Ig6v0SbGKXVZw4GnHFNg3lsqG6IKYcgPCg8ZfVhTKlgTNlXwJhS6RsqOE64lWZo56MZCFm+pGGY0bCJvWQjOLvUnVqbXdrF8kSsf8YP3SbgVH5Cm4ajEFol+8RUkFVZt802KUXsbFt5kU7F3BiPHnFdmytE0yK38gBLR51e+HP7nL165T/DuWduQzi6Knv30m6hnatTNItue0QO6hpnX5mP7isbd6ZoXobNOQh7p2GOh07H0k1KBrvowIsFl31tiiYfJHVTNDdN/1xqsiYrpE/njh88eDz3zXQ3ywpd38zdcg2cnU4Ln99oRYw2//e4tCimue/7g0H/9/G4K/Q9fxt7U2m3RgLzBw7MV3+j7S6VrtCqv8EzEtB2u362zs5cuDXcFay+nMjI7UQKpiLhVJBIeFZ9OZhiGnBWrMNZbfLoGs7WTR69zJk8ejrWNDKxA6PwYMicejucXWry6Kam6RI4e+5iCMpuNFmXxNnYJTDkim20a65Vu5YEu305eqIUZyXA2Q4HZ/bWaXzEw5D9/FTEGZYHhtDt7AQTZk6FTsWEbBNFXdjKKMbbM9zmFu29Mt3VFzN2H3lvrHdwgzlcYS7FfPXP2ckxlzGfcPBouGntBvCIkYmqW92g7XrzzhwaszNP80F5OtuKDlWV6RyaBm2ngrbrf8oSUNt1o7YT+lHbdQtqf03bTeZrc3MvjXbXpgrtvSKd3ajrzrw3dM9v0IAryiVl3V2HbwUs8ZX41LJY7dkksmZeAahuWjbn86eaumUIFSaQk/fUkI7bHES6gRliBnM2T1F/WR63MVsjfe8cl2tOx6VwuC4zdymM1nySi+NxX82BuTRGfatpupUPXQKT7BNr6TxCsuQ694Pu5xgcZDFUJNJmox09xBZZuZnQ9tOsRNjfMzxXVKL9UcIQBt6UkVD89wxhpTFZlarwT1LlEvkhfJSp8n0xuRCK/h4/GSrI0f549feMlFVG4CYcjNTnn3VmGij7cabSR59ZrFtzbjpXpM2FOVRKTx/dgOUoJ5zghDFh0qbkkA+NPeqny0PfDPdl24wZ1FAikDeNCZ45pDQDuDTLoW+60z5x5Eq83xa2wknH46oNJK5xAZ3sUHtYbf0o6qaaJKUJ/krNDvD1LKGRc0nu+v2pZDL1A+XE/sVPCslAPC2n5FLQf/u+VLfQ/kMJLt8tFMJZWRk7k463kOuKQT4tdPj/Npr8xlCgU0wn/U/ycYkLHkoVE5UnS9fPTFxfJHcvHDw4r0X7pbihhKXQ839TunG6dNNQ9cZd+/ft2i8oBvvz4u6hMHvDsYQk89X75R3V7I3JLVKcnFB2aeoeubshhlOYMrPdznFbQfdyJdhLtyrjxPpEvjZIzclpxxx3daKW0KZlxkp2qGgYRuNcWbvp12nn2DhddtN4lQ5sTyWnBZIWppMpgtyfLujHt1fvn7tlqJDeJGYlSy6Buln/tzSRTBC2PTnZ6wrRK6/O3zJaUNWCcdzTsiGI/cPhj+Fm7b5cCZueUyFz6F3Dv9FpeDv4N4lp3xH87k9tcAbWYlyF2Yox7sXgn9oM/mmH/lbfhIEcYGklxELYQkZ4l3i4SLT7dri4aMT7zjBy98YQuE4XYd1nGz4/fXOsmAXNnNatgSaM8GjIV1f2aVFrZh5TVJNwOAmIa1mL894Vei4V+r4dis6shr+fqW0beGfI0TbbUVAvM0m7voBdeLSMcMm5uzlsXkDt3InaNxrCYTt++nyssDN471IzeF0XE5TGubz/aaNouB51RvV+nPxpbVRv9Ue0mXPIdWGje1wXu6YYFadW0yeI8vbuSVVbfQZFf+3xg1ZTF4Tx7fZcMw7Os/VPQMEpBHV9LQ3z/Wvj3CkgL7/NjH/7kRnpQvn2xS8sfBzn/P8K5/yHcM7/V1RDDND+yPsYxrPH8xpzhPnfnBruB3RrlCxXRul+2NECsO4he0vzfB78fHv034c18yCdt7DUslw5uIQJioOYp1nikFfpFPuk3bIdbaFUxdgzE1yujGfwr47nm1XrOvzgdrAGM4a5M4QT3KLhCp+ephsrR3HD7ZJhHgpVkpntqCw9YYtvh/fdIfMqp++0YZSgs6fSG4vSIYwuZ7Rgpva0AKdREDcy2KPj6d7BDJ0+GGscOXjf2sTBL0xdOytNXSeluEhH0ncuXVQT4u7b900Xjo+lyuOK2p2c0SamSr5Yb6r6iiIeP5DTJ07icMKLjiRUp/fIX7lub4TzJdNdza8J5clppXzj7mxUiY5KdG6GpnCJLiVN5Oxe7eD1u+eLOL3wArd+aKHL3oMNfFdg5ph9zEmn5zdjP5HuqvopuWYJGPADlAGdZ9DtBqdWWTcod7/zELpKdBgts+kLPd7Wny1tnbmczsvdDcKY2YLUWRi0p/iUEpR8bzs3N75+aG5kw2DgyLsco8tm10/R3WSy8OK7Gayrzq1N1XWfaRxJ/Na9DWN2G3C/HXD/iTXc4zykqQbcL6zifhhwP0wHim6K++HVHTmI97G5hb0U7+VQ+FRmy+KVdKdjyUH9AqJ+73tA/fp5xZEN/ebvHvXrBhgf2KRf/Z3jvmGisesT69vcG3C/k/kgc2wN91fYszrrp0MfoIjfhQ2L9MGLGxB/NSB+l830O2ymPw3In12kqL+Son5ymqL+ikGn4eJdcztuPOTzabK68dDb1PNH4PiD8gWlUFAuyEU52fWL5XRSLl77njleUNLPCqT72bQiFWN//ddRUrygNTB9De9TgPermA8zf7eG9w8A3g818PyV2umSnezfCYg+PU2PiXkdpQYYDbQUH9yEGtfbiY03fvX0Prud43LOXHjKGg+/aU48xZwan1i4nDZZrB7RbooloN+p6HCJxmY44rs/u5/S74Oh8OnMlunZnZSAH6iprZ2gyYZnjfdKShqCrO0hth3QWnT3hxK14BWTc/7OZvKjEJdNyRNwut2f8lV1jhvolCc/+54JvBTlj+92swezqjio8tFbnGPtAtOo29x18jUNlP4Q8+gapXcAbXc3UHqrZl4DHgM4tfvAqT2MM4Gtcd/yqZnxYZ9qMUBqRrNm4G2cs5ZA1g7AvZ0Hlnx0LHkD7a+FuzPDtgocD1mjW0Eal8IojcF5m7DWvmsMwzqw0+4s7qF+oLXjPYvluuzMOso1bqF99+ao5jwvraPY6doW3HdBu8VVh/qCr0E9/tWap71GN52ZYK4Ayv2lPa0AdwFts6f04Q5RfE48vI1r1iJL3YQienRLVDInW5ZPDU1i3XyxhUYg4M1hvlEAopWE7XD9yhYUbtp6vJ2zadcNtHsfBi1D9niyRToS88rwqT41MItiWNpOt5Oa3SGzFwi2bYC2IjcQLPPO6IUj3WJROF9PrYhQEFZpNHPjO6LQff+y/BqBn2Ijge6jm/eLAqXN1uIoUKYb9yUhZUbK0srTDZQZ1199VX/1wo8oVSIz/d6wmHR95S6aN4dXT9i9m7kMrNRRpMYOpEZZBzuEPcY4Bu4AkGAfItHLYoeVeUS32uFmN4jSRylFFkBCFjjMVeGsmoHmZfNAvnIVbUi6Cp/AMcBRC4bP3RrJWzfB4VXY2h3cBsIzELI6p+D96rA5ZJhKyCwA9q/cAbdH8HIWPWmrPUgrQU5DM/rEdcJTm5ZQm/hPpQEHm2MAKtlP6MKYE8dG2bty1twL6oxLQqFhV85dyvzh8b8PghAdrA3YPblwa1FSdemLuRFJz8a7Rqq3haJ8d5Jw6SI4wm3VT6XT8eEDXKI9ndhRvHYheyYqyJHtNybE25Rp8lMSao3z8dDORDLM+wjzZPEDW8UGiUoZIkT6cjF7ePblPeU7uVgk6mPFSQFueWN6ztfqZcWJaw6kxKjPeEwUhcIPnubScZ4LRvho2J515Mx3wuc+02dd4bNb8bEBI/bg+NrTA3bUnh5gdttT44ealytDdBTdUBZH0Q3RUXSjEPzM4yD5bqBEu0xTH+/iQQMNPWTv6ZkDn8ANWkdMdWLEEN7lgwdq7WR1DyBY88dKzAJzkLmmcbL+5YCg91MEgakg5jWrw/Uvp8P1d68N1z+Eg5YwPTRWpnHeKWnrdqr4+TBV9Ftxh8K88Z4m7m+MN/5YM/g3Czv+8LH87k82BiAXXlg/pr8B75cB3j94sScamHsa8L7hoQaHnIcanJIW9hyg+A5VMnvfT+PwPYjzA8Yf5ykHm4Uaf5TnHmwacPzBz0JglUvEHiWwsB9i3teIczSo+x1lcHgV4YsU4VeuIfzaVUa/3MDHvVvSLgO5vJKZ3WFnxN8DtjePMf5YXL5ZqPGHc7nrxQ1Bx8pt6xndXYfzHcwHmOsx2q7H+jyLLE45fbtmfli3JsEZPQgW9IZVEsznT411oVszYzeVY7R9GB3Rw/t9q2S5Ef1PkANrcrs9kUQyzJ1h6+CH4ezwe3/YR6OXuZEg6/zM96aEVp3N9URZ8zbfgxKqqxAuNorGYt3MGLLkPNsgzIxhTWCE9o8DNfrzOH5MogNK6b7zBJ2MXemn0+D782ASE/QRIQnnESFWf4KORGQsj0QPNnuEVOQdzI1fQqXMg1L+2KpS9r79KPn1D6I6/9LbPOqg4bkOY5jb3uS5DoM27G83FB+fkGINhgHsUeOdPcZhozZ9B+Pyr99EVb7dEx3c/229ImRhsTbcMYg1tjOVEsKdBGi1PG5q3ELstvpO+hiPikbHUWkFALpTo3Oq4gC0mKft9FpnCKfnM/aYpk102Dugt7pRPRX+v96uNraNs47fcz6/JHGcs3P25eo4jnNxHMdJrrbrZM6bnfc0TZM2LenLptCuWwYbYrCpgxFVVT/swxgVm5jEgHXAJKZpH7q7JEUgDVFAE0IwwZDYtA9D+xJGJIT4hFraWDz/5zk7Z/uc12kfKp/Pje/8f/73f/6vv98u1ru6zPzcu7LTkuM9YEb/7bWk3vOwziMFA9ARMgDdjI9qSK2HM6v1AN5DBEslQjAHIuAZChE4FAAezZ9QI4UikF75KbYRuxFIsVGZyRsBYWehoP+aQETdW9hJRe4WzfywzOtYRs9b17F2fBH4ToCHjFDpWCjt9AVF7SDhJgSZczpM/kX40R3YEWm3dSXBEZlzr/AJZ5psjpoggUNiwbHkLRufSKbO6IAuFLAL6w2tuZfDx3dbCHxqho3YbRHSEgloYGgHMPnXh6Mh8aevhaPRlE+6il6Ixf02mz8eU4IL0R9HF4KxwomzV69F5Giv2HDxWghd8YiTrpA3LbS4ZkRPve98tVSXFkJ1x0SPdTk6LDx3JYBSEbHT+0juHTldQJUPS5mMFAr1Z2Z6/pqczaZlOfPYowHUG8FP3MzjgfvhQFgYcvp8zhEhHEAO/G7G4aTvmC1uK9sIk2bOMbdM2BjUM8pahmbk5iAjN6ln5M7vxNHwYGlG7hSvzt/WRjx31dHbzOrI6PwpmpHLH5GMHPQXrvRlzsC8NzA8rDZPTs9R8mcjzYOWmcP7bd90eu+EDztl4vZBCLFD6m3vfBHYcJrn3Ir99xgzxJwHdmjCJjFOPHZgk1DjhcpBBi9QhifoB/CkgP+SAQ+yE4qjM+6VeB/ppdDiNfoGshN0hlkF5uD0E2bB0AEZKbhnS0ox/6hAUWGU56RBnlvsHIZKTAlBB8gz3YlVdmr2LDE3bm3+FKl01eTLLAeAIjGLew5E52Ea7xyQ4oONl2zyRnkO4+hyQpcnYE2c0dlOaHVlBAtzZMuMQz5qhChnhvRVqQPEfvcYQpvtFLNCseTgymkWwxxQOS3vlVdNvr2Dfo5geR5jHmNe0eU5j+V5kernUWUtTm30MNjodFHVRK9hndOlXFYpGefVsdvaEWyXU9guH0mNjVO7nD8idplUujrjEGZq4jl8nB4YpoYDqIo6B9LpXa7QtjWQg6/VTlWQgxoVtlIx5MGKBDic4XlIk7rI4/oKZvHSzdEV7CXVkMNb1RC8cH01G6udfRB9Qg9iH22RwEu4uihCRn0Bn1xQoC5CEgNH+vBCHMbWXJtcwEdQ8djNU1PWaVpxBUrizV0a9kKAWUHyW3Hmrp+d3FZR41IFm3Te4FVamHUkcB9bZex3Qz9vN6O2KprXtpEHjcsqWtxGZ2lcHwCSWaCOJMUnTcDftoPPcm/z2XpX1tJAQOH+melGT3BOXvY/IbbyTitXy4d9T/hb3E7O/KwlDxWXW54XG3nRZhP5gG9eaOYFu13gg5Z609P4d9/U6wgPMGPMCeZJnSenJ0lM8RDlXoKmu5MEVVlnQgZr3ILtxDxsbVb8pFsSYIGxPdb6oDjQ4lmRfEHy7E91QZNrIg1lt9WgJX0CfG/eo/kaaYsrhVE26F9vjwE+2aCH9PmvQoatz6CGN+VRYUvbuiZ6k4FUJBZNR/sFtKVyXZneB1p6hJg30otE9KGYlKmGXRCTreQosBiVR+LzBi2rFkO+ZDgVjUX64qcNmmbztgRSgrsXXUJ/4d1Eo3Icz1M1O2r0m9P4iZ4BvNsyVhU1g32G4zsRq8wWEausWPtIf6cT4Gyh07V2fIoIuoRkRc141Kn9Ua2Uu297J195sNxZ2zsfC/dIKXl3sUy/aSbT7N5lmierWa3ty5KiQMitjY2bCTWrFwn2wV9j4qftVaiozsQ327tYLbfLcs9Guc7BpLQJA9CJnYR6slRRj4MnAILVaqfTVKqT6c+ID8jcldu7TGfKHbd9SPQXZa6aMQZL45jhC8zPzLR1XFFPJbUhO2Ce5QvlRSLug4MRR4msV0+EvHh7n8LnpxTthIMWyfPC7yMa7azGUh4aJ+NREA57p/D7GRx5aCHotvO3fWZLsR08+N4tRzme+D4WZKNCvzCtt+I16cMx3EPFjDqkhjhbgVRnrohU55at1t4/DJ0/aqdHG58w8Ouow2712P5YdkxMxN55d5AZouu+yHhsT5nZCZAf4Wjth35kYA/QOhDguQBKeLXOsjxQ4Lqv6kgkoGQNY8Xemvx8dZ6ZkYDjFrEyQk+ynoQJFdMKyqE8px5aKqVfzL1c4F5EaSPtYu73uXXbk/5k9NBcIvevPNviW3m2xdy6/svRHUqy+AnlWNRzKAVdmWIWmBdLtAW7gqeTWsYOk1sIR62AfDvq2FgNjPbjR9MNZHFYCkmiSKMEdVI7iT9uPnnUQVXqLMDsuaGhQsQP5WjA7Vlz1toy0NaiHnWvNAWBt0lt9mjHT+PPO0+6aan6ADxO2z+pe9c1E+z//Wnaj8wf16J59x7okCC5XoUjNZAG7J1yUANRXUkKtkNxO/TBf2CmkPBhXWJFIoUBSaiKaTWBRAIy4IzGN4Bn2p4uQtipDCdknLl168OJUuBP4SsL6OUyTKGvnF8OvxMMv1fPv1sdaAo1OH8pNljEkUcH0PenLpRiC12YRs9mnpiODsi5ZbGN+0lYyl3vGjf0+IwxF5mvQ2WyX59DO4bIwH9I0R4mHRDq40kSIQpYEZ8iMhgHbHMC3wiOuvpwQm3htUtgwyA5ldCehg+wRmk8dtzVS27oeQtAqxujHeuHaB2f1mrOkeoJGR/Ie+j4ad1lzw4ySV/1FAWMFq+1tIXH4ZUbpGgsFf5aZsAfLm7duUxbdwRD6040xrdH14Kx1rAktXgd71bzos//iOB3B9w8L9aflhs9zjobiz5FAaco+vizpJPnf6wS6e2K4j8RHf4GeZsWnkjEVcvxflFsjcTHPH63aHF5AiLrEQ+5eZeTd9XX+9w/L27pMeBW+MnUznUdGzoCwGxrzTQHo2OzNRIaqFVHayP0MzpIP6OD8kIZxlZ03LbV6kSHgw6wQG6xkUIM4C/A69UcweslHCK80Vo1DBZ2A++CJ6HXPCOizsS07WDLTqM9xQMu/ynHsthuwIVrNse0QOgCd1Ov9zUDT4Fam9SsAGPuUwgbgWYFUB2Gz7OtmLh9Juk3kwIcXCvFrXPXbSNMkFlk1ICyZqXr4YWcWK2eE2tWtFBpBkzi1YbbmsNzV626zaw6qhokmgHLH0EGDN+pt/hOt6sh7JCGsma2ye8bORaYXbImfH5/o7Br3Pcs15hq4AqoUjSW24B/CJIpTh3Wm36TPdSClGX2yUz/tzZfWrb4l5TeJURmhybYNeuVbb+jfus7Jpa54czA8r1fG76CQXhXdFlexXrlBvxzO3ZLPATyvIZAE+svag2/xrmYHg6IPrX6PJOBPnCbB6RlIx7bN1ztmYmYMrs8q1gu82MN6JPU6LGhzXejQ0NF12plyEgWvZaDXou+aE7XRv4Sbh3xtjDCy0bIV9fj60TwdSyvsP2wlfBjUi6UGpshvye3aHkVPU+vUXfwa+Q+ZQeKr8GigMXFvUF+h8wMgdRUCcd+rQbBYYlpnAvmzuDIg2JrAXoee8s+F4GDDlcQY7jsDAqAYCPZiQ5l9luzCivk781UztESsZfcbwokr/oK97slESiNw50eoqJqIguev80yMYXLzqAAub38vbKCLsdniE6UrtVQ6dLBfWJf8g2yduQ+6yhD6+d7n6XrPVi6/PjZfQ6tcYMc7F3dwBmwZrdTmhbyYiANsFPSAPsWacAWQ2UpcRL+VpLORX6SbSNZ3tw6ybexi+hpkpOVGiGDdr1wDPvoVWSzjrFXCZ7KKeA/xaoVP55MEhIDOYMdOdm+cctaHWobHGkVCwTxdXXY6aPktjF8GKMdD5N1lCaeboGVcrDhfX521eYWD8sCUCHY7cCKgA99vB19SM575cP6+RZv8Xl4Yzz/vCmLQuMezmLbeYd5gfujrRrvpoyOJG3OSmS5Y+ODEvtbT3dDLBsObsrsO+FsNia112+OBGQPZ+GvBWW/j0d/c3pHYxHFm5NycSmZjE14neh9j9+vc6IarlfGRGDR4auJet7JhNlfbbYEWzMxqcvD/k5qctu4erlxc9gTlWKZ+8mkhP6MPhUOR2KjQm0uxvv8cvCa3O73e3KK0zuBr/Um9q3geZ9knmJWhvOYRHFFHaf8dWwCbFZbkhBuNieAepO3UCYI9gNoZV+JsoS9pRuA0qOtVbEVlpC7sDo4GsRpURbHYpzd2T5O2grsHXnn6UhvN1i1NpgWKIXkrENkO5JDNkHUj8QmmtQuhBByy5tfsnEct7Tc/1rqxWeQg29rqh+Tc7lQe1B0fRVdwxthrtHpQt+Bg4+WCEbnXf0//fvy9fgPB5fZxUW7vy0cCTgWl9CAEaPz73jrU6YV5YGl97dAOhcfRSkcR/nZFesKlpvAJLDkwMuqSgJsv+aTEgnKCkUBHZsOA4RaklJDVW2s1BCGnBo7MOTUEIYcVEX2AJi878LRRBcP3pLmxxEtgEF2AZE8yaHC2K0f+jGAGJD6DjpKKaU3acHhlR8lC+/tOqq5jn7lV+LorbiixC8PyvLg5Tj7ws3f3L6Zjnalas5Wt/j9cvXZ6p6uaNq6Mj04OD24eUOJxxX20uYNSyT3Flq4/1EslYqhD28IUoP3Rg7HFCnQVcjJzXPz2LqkKB7kGiKmzXisc9uuWaiZoy86w23cHXLDF9y7SXX/JRyjJa3rzAmo2CXAz8eKOIBjsbYEoD0NUUr5ICHvJOPNJxV1mow3Q4NSU2IlC3wXTLYey3ea8FVOgyJmaRd1Ww0ODgZ7XbG1Tp5xcFDQpa5PyYCyPpDsyvPMF3ds0U4ud6h4EvklaNfvDQxPfPf8c1Iy6sdRufQDGC9G70HrVrrQuvWH/MBLOrdk09Msvfhc0egxJ0RkmEmGeeJIWQtXM23xun+/ZNC4RH7Nuvw6SCxrkF+SDLSUyy+hyy+bTZfJL0YnxFcdsTCW36FK8ktWFphMBJo0zEZUkB/iKknsYxDo29Jh0lYrvF1RfCCxe18ulRj3EBFnfmqiTHz/B+FVmgwAAAB42mNgZGBgYGL0cDKX+RjPb/OVQZ6DAQQudZZ+Q9D/xFkPs00DcjkYmECiAEFRC6h42mNgZGBgm/b3PYhkYPj/n/UwA1AEBTwBAJXTBtEAAHjaY3rD4MIABKyHYJgpCEg/B+IfUBqKmfhYDzHehWCYGOMmIC4HyomjqoXL+2EXB6ln3ABkb4OKbUOy8yl2PcSYSy5mZIH4nTEfiBmw4CQkdgIUMyDRZGBwOFQj+R8a9oyWUDcxAeknEDUgNshtDJ+AtDWQ7gfiaZCwB4sVAnEc1ExlIH0TiE9Dw/kNEIcB+auAWASIJaEYZO9rJPycymGqS0BNL56wacUhFwYNc20g9gGqW4THDFA6Wkc4DkB2gd0LMteU2ZuBgW0aAwOMZjJiYGBcCsSSEMxwCUgHAulYcHopR8L6QHPcgGGujsCMskgYZE89SC80nf8AmQukVwCxNAtEfCLDRAA9ZBqJAAAAeNpjYGDQgcIChjWMCYxXmDKYxZjdmOcxf2GJYtnC8o5VgTWFdRLrGTY5tiK2e+xm7MvY33HEcRzg5OGs4LzHJcTlw1XH9Yl7A48NzzJeLt4y3gN8LHx1fKf4ZfgL+A/xfxLwE5ghKCKYIcQjVCHMIxwmvET4h0iJyAVRBdEI0VWiN8S0xGLESsRWiLuIX5Gwk7gkmSb5QGqatIB0j4yYTInMOdkq2S9yRfI88nMU2BQWKRopblPiU1qi9E+5QvmYiotKnMotVScg7FJ9p1alrqE+Q32XhpJGiqaJ5j4tGa0IrS5tJ+0M7Tk6fDpOOmd0ZXQTdPv0uPQy9E0MWAwuGXoZrjHiM6owZjDuM4kzOWUaZnrITMtsjrmS+SQLJosaSzbLBVZWVles82yEbE7ZltjusCux+2JfYv/Poc/hn2OMk5XTD+dtLkWuaW5O7lzu7zzqPK08v3it867z/uNT4fPNt8PPwV/K/1BAVqBQ4KegTcF6wXdC2kKNQu+ELQt3C98TURfxJ/JGVEHUsmguHFAl2i46Iroqek70pRiWGLOYvphHsWaxNXESQBgQ1xbXFq8Uvyz+XEJeIh8AIPqQUQABAAAA5QByAAQAAAAAAAIAAQACABYAAAEAAR4AAAAAeNqVU81O1FAYPdOihkga48KFqxvDkpTOqCBDYoIgQTcSxujOpKXtzITOTGU6EF/AZ3DNwsQXMQJP4CsYH8JzTy900JW5ae/p+f5/CuAevsNHa2ERwGc+NW7hPr9q7CHAF4d9LOOrwwt4hAuHb+EYvx2+jaD1weE7OGsVDi8i8QKH76LjlQ4H2PPOHP6BB94vh88R+Vf5XCDwI4cvseQ/r/FPHw/91/gGgzY28IxnhbiDiKczh9eItpBiggQZcQ+fMEVFPOJt8ApjHFJ6jFLvWLIUoewKHkN2iD4GlEz1lfHOeJ84zTfYxoH0rf+K3AElfcxoHVOvQx2by1NsUmcHL/CSqLbachb/+jB/eXmnmFPmMmHO5obXfdoYV3vNRmS3VVGmHlk2xGP2aZOVxzgiP2GcnGxBn4l01vm06WMdT9i5mxnuUy+j5VQerd9cGRlKJ3oPJLFRS3a56ZqRzSHRVe65MmtscvGVGDuDVPOxVR+RszOp5C9hNxovY1UwpGc7kZCZjpSRZWJpvGUepSLsUndGLnVdNNqCmJFzRRir4/Ob0tg2mgNlUqKLVZ5TnVD51lahdmlEWeWs/99iVX3uU6eg1NqPiN6TS+b6VE+0p5oMd8r21/CsuT3o6r/ocjsi9y+0iVNNLdZOVapqxm7MWOHutecePpIZkrczLv4A+wyiXwAAeNpt0EdMVHEQx/HvwLILS+/FghW7vvdgKVZ2gWfH3isK7K4i4OKq2A3YSzQmHkw0tosae41GPaixt1iiHryZ2ONBverC+3tzLp/M5JfJZAijtf7s4xH/qw8gYRJOODYisOMgkiicRBNDLHHEk0AiSSSTQipppJNBJlm0oS3taE82HehIJzrTha7k0I3u9KAnvehNH/rSDw0dg1zycJFPAYUU0Z8BDGQQgxlCMW48lFBKGSZDGcZwRjCSUYymnDGMZRzjmcBEJjGZKUxlGtOZwUxmMZs5zKVCbByhmQ1cZy8f2chOtrGfYxyVCLbyjib2sEPsbOYW7znAcX7xk98c5iT3ucsp5jGfXVTykCru8YCnoX895gmfqOYFz3jOabz8YDeveckrfHzhG1tYgJ+FLKKGWg5Sx2LqCdBAkCUsZRmfWc4KGlnJalZxhUOsZQ3rWM9XvnOVM5zlGm94Kw6JlChxSrTESKzESbwkSKIkSbKkcI7zXOIyt7nARe6wiROSyg1uSpqks10yJFOy7N6axnqf7gjW+jVNK7V0a0rVe1wtGqGAUlcaylxlnvJfPl9ZoCxUFindlrraq+vOar83GKiqrGjwWSPDtHSZtrJgoK61cZklLZoe646Qxl/mHJPneNpFzjsOwjAMgOE4aUP67tAVqazkBOy0SxfE1EiVmJmRWGFhA+7ACXCZEJcrLoSw+fslW37CcEK4sAbVqu0BrqavpW5nmJsGizUNRzNFqbuWIZQVCr1EXlYvBh5jXH8syuoBNwuPIM4WPsFbWEiCn1lMCDL6AlDZyzFVdee6F/WeGBHjnWNIjLaOATHcOCbjV+owMFfSsSR8/i8ZraSpY07Mgh8NFvoNSX9LoQABVmPFdgAA) format('woff');
                                font-weight: normal;
                                font-style: normal;
                            }

                            .mk-icon-sim,
                            .mk-icon-visa,
                            .mk-icon-world-map {
                                background-size: contain;
                                background-position: center;
                                background-repeat: no-repeat;
                            }

                            .mk-icon-visa {
                                background-image: url("{{asset(' assets/images/visa.png')}}");
                                background-size: 40px;
                            }

                            .mk-icon-sim {
                                background-image: url("{{asset(' assets/images/chip.png')}}");
                                height: 30px;
                            }

                            .pull-left {
                                float: left
                            }

                            .pull-right {
                                float: right
                            }

                            .clearfix:after,
                            .clearfix:before {
                                content: '';
                                display: table
                            }

                            .clearfix:after {
                                clear: both;
                                display: block
                            }

                            .credit-card-wrap {
                                width: 100%;
                                height: 220px;
                                border-radius: 20px;
                                background: rgb(0, 1, 3);
                                background: linear-gradient(261deg, rgba(0, 1, 3, 1) 3%, rgba(0, 1, 10, 1) 13%, rgba(0, 0, 0, 1) 22%, rgba(2, 5, 56, 1) 49%, rgba(7, 56, 152, 1) 63%, rgba(8, 9, 45, 1) 82%, rgba(2, 3, 36, 1) 95%);
                            }

                            .credit-card-wrap .credit-card-inner {
                                z-index: 100;
                                padding: 30px;
                                width: inherit;
                                height: inherit;
                                position: relative;
                            }

                            .credit-card-wrap .credit-logo .text {
                                font-size: 12px;
                                font-weight: 500;
                                margin-left: 5px;
                                text-transform: uppercase;
                                color: rgba(255, 255, 255, .8);
                            }

                            .credit-card-wrap .credit-logo .shape {
                                width: 20px;
                                height: 20px;
                                display: inline-block;
                                background-color: #dc143c;
                                box-shadow: -2px 2px 0 rgba(255, 255, 255, .8);
                                border-radius: 40px 0 40px 40px;
                                transform: rotate(-45deg);
                            }

                            .credit-card-wrap .credit-logo .shape>.txt {
                                color: #ccc;
                                display: block;
                                width: inherit;
                                font-size: 12px;
                                height: inherit;
                                font-weight: 500;
                                line-height: 20px;
                                text-align: center;
                                transform: rotate(45deg);
                            }

                            .credit-card-wrap .credit-font {
                                color: #fff;
                                font-size: 15px;
                                font-family: ocr_a_std, sans-serif;
                                text-shadow: -1px -1px 0px rgba(255, 255, 255, 0.3), 1px 1px 0px rgba(0, 0, 0, 0.8);
                            }

                            .credit-card-wrap .credit-card-number {
                                font-size: 15px;
                                text-align: center;
                                position: relative;
                                letter-spacing: 2px;
                                margin-bottom: 3px;
                                white-space: nowrap;
                            }

                            .credit-card-wrap .credit-card-number:before {
                                top: 100%;
                                font-size: 12px;
                                font-family: Roboto;
                                content: attr(data-text);
                            }

                            .credit-card-wrap .credit-card-date {
                                color: #fff;
                                text-align: center;
                            }

                            .credit-card-wrap .credit-card-date .title {
                                width: 50px;
                                color: #deb887;
                                font-size: 12px;
                                line-height: 12px;
                                text-align: right;
                                display: inline-block;
                                text-transform: uppercase;
                            }

                            .credit-card-wrap .credit-card-date .credit-font {
                                top: -5px;
                                left: 10px;
                                position: relative;
                            }

                            .credit-card-wrap .credit-author {
                                padding-top: 3px;
                                text-transform: uppercase;
                            }

                            .credit-card-wrap .mk-icon-sim {
                                width: 40px;
                                margin: 10px 0;
                                border-radius: 8px;
                                background-color: #fdd76f;
                            }

                            .credit-card-wrap .mk-icon-visa {
                                width: 40px;
                                height: 20px;
                            }

                            .sitelogo {
                                height: 35px;
                            }
                        </style>
                        <div class="wrapper">
                            <div class="credit-card-wrap">
                                <div class="credit-card-inner">
                                    <img src="{{asset('uploads/logo.png')}}" class="pull-right sitelogo">
                                    <div class="mk-icon-sim"></div>
                                    <div class="credit-font credit-card-number" data-text="">4716 XXXX XXXX 7554
                                    </div>
                                    <br>
                                    <footer class="footer">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <div class="credit-card-date"><span class="title">VALID
                                                        THRU</span>
                                                    <span class="credit-font">
                                                        02/28 </span>
                                                </div>
                                                <div class="credit-font credit-author">
                                                    {{Auth::user()->name}} </div>
                                            </div>
                                            <div class="pull-right">
                                                <div class="mk-icon-visa"></div>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wallet-card" id="tips">
                        <h5 class="text-primary">
                            Everguard&nbsp;Tips
                        </h5>
                        <hr>
                        <div class="transactions">
                            <!-- item -->
                            <a href="#support" class="item">
                                <div class="detail"> <span
                                        class="fas fa-piggy-bank image-block imaged w48 text-warning"></span>
                                    <div> <strong>Auto Save</strong>
                                        <p>Set a goal, save automatically with Everguard Trust Bank's Auto Save and
                                            track your progress.
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- * item -->
                            <!-- item -->
                            <a href="#support" class="item">
                                <div class="detail"> <span
                                        class="fas fa-wallet image-block imaged w48 text-success"></span>
                                    <div> <strong>Budget</strong>
                                        <p>Check in with your budget and stay on top of your spending</p>
                                    </div>
                                </div>
                            </a>
                            <!-- * item -->
                            <!-- item -->
                            <a href="#support" class="item">
                                <div class="detail"> <span class="fas fa-home image-block imaged w48 text-info"></span>
                                    <div> <strong>Home Option</strong>
                                        <p>Your home purchase, refinance and insights right under one roof.</p>
                                    </div>
                                </div>
                            </a>
                            <!-- * item -->
                            <!-- item -->
                            <a href="#support" class="item">
                                <div class="detail"> <span
                                        class="fa fa-info-circle text-danger image-block imaged w48"></span>
                                    <div> <strong>Security Tip</strong>
                                        <p class="text-black">We will NEVER ask you to provide your security details
                                            such as COT Code or any sensitive details of your account.
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- * item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
<script>
    toastr.success("{{ session('success') }}");
</script>
@endif

@if(session('error'))
<script>
    toastr.error("{{ session('error') }}");
</script>
@endif

@include('user.footer')