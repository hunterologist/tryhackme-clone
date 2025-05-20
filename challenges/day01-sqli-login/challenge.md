# 🧠 Day 01 - SQL Injection: Login Bypass

در این چالش باید با استفاده از آسیب‌پذیری SQL Injection، وارد پنل کاربری شوید **بدون داشتن پسورد**.

## 🎯 هدف:
وارد شدن به‌حساب کاربری admin فقط با تزریق SQL.

## 🧩 نکات:
- دیتابیس `users` شامل `admin` و `user` هست.
- فیلد `password` بررسی می‌شود ولی آسیب‌پذیری SQLi وجود دارد.
- یاد بگیرید که چگونه با `' OR '1'='1` اعتبارسنجی را دور بزنید.

## 💡 هینت:
```sql
SELECT * FROM users WHERE username = '$input1' AND password = '$input2'

---

## 🧩 مرحله ۲: نمایش این فایل در UI

ما حالا با استفاده از جاوااسکریپت می‌خوایم فایل Markdown رو بخونیم و به HTML تبدیل کنیم.

### ✨ فایل `index.html` رو به‌روز کن و اینو بهش اضافه کن:

1. پایین فرم لاگین، یه دکمه بذار برای نمایش راهنما
2. اسکریپت جاوااسکریپت بذار برای لود و نمایش `challenge.md`
3. از کتابخونه [**Marked.js**](https://github.com/markedjs/marked) استفاده کن

---

### 🔧 نسخه کامل `index.html` با راهنمای Markdown:

```html
<!-- اضافه به همان فایل قبلی -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Day 01 - SQLi Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body class="bg-gray-900 text-white flex flex-col items-center justify-center min-h-screen p-4">

  <!-- فرم لاگین -->
  <form action="source/app.php" method="POST" class="bg-gray-800 p-8 rounded shadow-md w-full max-w-sm">
    <h1 class="text-xl font-bold mb-4 text-center">SQLi Login Challenge</h1>
    <input type="text" name="username" placeholder="Username" class="w-full p-2 mb-4 bg-gray-700 rounded" required>
    <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-4 bg-gray-700 rounded" required>
    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 p-2 rounded">Login</button>
  </form>

  <!-- دکمه نمایش راهنما -->
  <button onclick="toggleGuide()" class="mt-6 px-4 py-2 bg-yellow-500 text-black rounded hover:bg-yellow-600">
    📘 نمایش راهنمای چالش
  </button>

  <!-- بخش راهنما -->
  <div id="guide" class="bg-gray-800 mt-4 p-4 rounded-xl max-w-2xl w-full hidden overflow-y-auto" style="max-height: 400px;">
    <h2 class="text-lg font-bold mb-2">راهنما</h2>
    <div id="guide-content" class="prose prose-invert"></div>
  </div>

  <script>
    let isVisible = false;

    async function toggleGuide() {
      const guideDiv = document.getElementById('guide');
      const contentDiv = document.getElementById('guide-content');

      if (!isVisible) {
        const res = await fetch('challenge.md');
        const text = await res.text();
        contentDiv.innerHTML = marked.parse(text);
        guideDiv.classList.remove('hidden');
      } else {
        guideDiv.classList.add('hidden');
      }

      isVisible = !isVisible;
    }
  </script>

</body>
</html>
