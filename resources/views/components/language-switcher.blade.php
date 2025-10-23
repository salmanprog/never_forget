<style>
    .nav-item.dropdown {
        width: 100%;
    }

    .nav-item.dropdown {
        width: 100%;
        max-width: 150px;
    }

    .dropdown button,
    .nav-item.dropdown .dropdown {
        width: 100%;
    }

    .dropdown button {
        padding: 8px 20px;
        border-radius: 60px;
        background-color: rgb(8 30 55);
        color: #fff;
        border: none;
        font-size: 14px;

    }

    .dropdown-menu.flag.show {
        padding: 9px 15px !important;
        width: 100%;
    }

    .dropdown-menu .flag_link {
        font-size: 13px;
    }
</style>
<div class="dropdown">
    <button class="main-flag-btn" onclick="toggleDropdown()">
        <img src="https://flagcdn.com/w20/us.png" class="main-flg" alt="flag">
        <span class="language-text">English</span>
    </button>

    <ul class="dropdown-menu flag">
        <li><a href="#" class="flag_link" data-lang="en">English</a></li>
        <li><a href="#" class="flag_link" data-lang="es">Spanish</a></li>
        <li><a href="#" class="flag_link" data-lang="zh-CN">Chinese</a></li>
        <li><a href="#" class="flag_link" data-lang="tl">Filipino</a></li>
        <li><a href="#" class="flag_link" data-lang="vi">Vietnamese</a></li>
        <li><a href="#" class="flag_link" data-lang="ar">Arabic</a></li>
        <li><a href="#" class="flag_link" data-lang="fr">French</a></li>
        <li><a href="#" class="flag_link" data-lang="ko">Korean</a></li>
        <li><a href="#" class="flag_link" data-lang="ru">Russian</a></li>
        <li><a href="#" class="flag_link" data-lang="de">German</a></li>
    </ul>

    <div id="google_translate_element" style="display:none;"></div>
</div>
