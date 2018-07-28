```
//
// API 接口文档
// 认证信息(比如登录接口)会同时返回在cookie里和authtoken字段
// 客户端请求时可用cookie传递也可以用authtoken参数传递认证信息
// 通常web前端可以无视这个cookie和authtoken, 因为浏览器会自动处理cookie
// app 端的如果不方便操作cookie, 则可忽略cookie而选择authtoken参数传递
//
// 关于响应
// code = 0, 表示正确
// code = 1, error为错误提示
// code = 2, 未登录
// code = 3, 需要补全个人昵称和性别
// code = 5, 服务器错误, error为错误信息
url = "https://dianyin.trancn.com"

```

### `GET /api/registerSendCode 注册发送验证码`
<details>
<summary>Request</summary>

```
GET /api/registerSendCode?phone=13800138003 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Server: txthinking.com
Set-Cookie: app_session=eyJpdiI6IllHWmNURG1GTXF4eUtxOU5pZ2NwQ3c9PSIsInZhbHVlIjoiMzFZWE5XTjVcL3NySFA1eTRESENPcHpwQlBjY25hN293TUZZMFpNZ3ZVVnVBTGdpZ0VTaVwvUWp5a0NtVE1FZk5xMkh6YkFHRElpNzhSZ2ZHUkliaEtNQT09IiwibWFjIjoiZGJkOWVhOGEyZjU3ZGU0MWE5Y2FkZmYxYzJkMjk3ZjZiYWNlMTk1NzU2NDg4NTUwZTgxYThmNmU4ODgzZTBhZCJ9; expires=Mon, 15-Jan-2018 10:00:27 GMT; Max-Age=7200; path=/; HttpOnly
Strict-Transport-Security: max-age=31536000;
Vary: Accept-Encoding
X-Frame-Options: DENY
X-Xss-Protection: 1; mode=block
Content-Type: application/json
X-Content-Type-Options: nosniff
Cache-Control: no-cache, private
Date: Mon, 15 Jan 2018 08:00:27 GMT

{
  "code": 0,
  "data": {
    "token": "eyJpdiI6InhYeHhES0RVZzN4RVg1OVhcL29LWjRRPT0iLCJ2YWx1ZSI6InBId21NaFVlSVltdllHT3BJT3c1V0s2NEJFTWNFcnBYNVwvR2NmS0NKTTI3TlwvdmFrd3JDQlZwTExRY2ZndUY1MURJak51Uk01OEp1d1VEd2d5bm1Ga2duSVJXZnhYXC9TVXNmNkw2N0tzTFlLUWFNbUdiN2FySjB4MnJvbVVodng2cUQ2TlZEMUpVV3QxT1FPYUVpdDJidFhFNHJJTmxDS21QYkVUNmFlenRxS0cwbkFENkFnT3BDbWtCUHFUbzhVbSIsIm1hYyI6IjBkYjgwM2E0NmVhYmM2YWI3OGNmNjJlMDZiZDlkNzRkOGUxOGI4NTZmYzhmZmRjNmIwN2JhZjAzMWUzMzVhMmIifQ=="
  },
  "error": ""
}
```
</details>

### `GET /api/register 注册, 此步会返回认证cookie, 认证token(前端可忽略)`
<details>
<summary>Request</summary>

```
GET /api/register?code=111111&password=111111&phone=13800138003&token=eyJpdiI6InhYeHhES0RVZzN4RVg1OVhcL29LWjRRPT0iLCJ2YWx1ZSI6InBId21NaFVlSVltdllHT3BJT3c1V0s2NEJFTWNFcnBYNVwvR2NmS0NKTTI3TlwvdmFrd3JDQlZwTExRY2ZndUY1MURJak51Uk01OEp1d1VEd2d5bm1Ga2duSVJXZnhYXC9TVXNmNkw2N0tzTFlLUWFNbUdiN2FySjB4MnJvbVVodng2cUQ2TlZEMUpVV3QxT1FPYUVpdDJidFhFNHJJTmxDS21QYkVUNmFlenRxS0cwbkFENkFnT3BDbWtCUHFUbzhVbSIsIm1hYyI6IjBkYjgwM2E0NmVhYmM2YWI3OGNmNjJlMDZiZDlkNzRkOGUxOGI4NTZmYzhmZmRjNmIwN2JhZjAzMWUzMzVhMmIifQ%3D%3D HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Cache-Control: no-cache, private
X-Content-Type-Options: nosniff
X-Xss-Protection: 1; mode=block
Content-Type: application/json
Date: Mon, 15 Jan 2018 08:00:28 GMT
Server: txthinking.com
Set-Cookie: u=eyJpdiI6ImNucjBieGh1UERmS0RrT1NIMDNmd0E9PSIsInZhbHVlIjoib05IXC9HZlBRUXhSdDNWQ0NvTDZ4SGdSaG5id0VUWW9qclwvQlwvVCt3XC9jV1lqYzhYYjU3KzJTa2JWdFFEcmJVYVZkWVBjcTkxMjJJVURVZWxZUm9JTEZYRllub3dYWVptOVg1ZTlYdlVSMUVrZ05jb1oyUmNUUG1jUWJlMU5mNWlEV2NHd0Jia25jUFNkZWV5aFZMZTBrVURrTjF4UitiYWpVdWFjN1JMZXRKaU9Jb3hpU09hMzVtOFRCWk9EKzErR1pPanlNQ2lrUmRkXC9hS1BZMmVzdVwvMkdxeWd3NG1YMkJ0ZzZlT0NYZm8yTnFrcndQSWNwQitVVFd3VkZNRmlqV1VsTk1FYlAwQ3ExZXBHdno5WnM2bFwvVGhjNU9qMEd5QUM4bWtsdjdkOXVocGE3Z0hLRU1BMmhxb0V2RTJkR3krQXd0aHpCVncrSGtUVWxmbTI5UDFXS1FOa0FiK1wvbVVWQlo4MVwvaVJsNU1KT2t3VVp6eWNLQWh0OHkrdkI1QVB5d0N4UmY5VHVQT0cwNkVFY21rVU0wZXdEaWpIRFI5NUl1MWtaNVNwaWE2cz0iLCJtYWMiOiI4NjJjZTA2MjAyYmEzMmYzNzA2ZGFkM2E1YmRkYmY3YmZhNmY3M2UyNTllZTAyNjljNWY1YjRhYTA0OTk5ZGNjIn0%3D; expires=Wed, 14-Feb-2018 08:00:28 GMT; Max-Age=2592000; path=/; HttpOnly
Strict-Transport-Security: max-age=31536000;
Vary: Accept-Encoding
X-Frame-Options: DENY

{
  "code": 0,
  "data": {
    "authtoken": "eyJpdiI6InZNTGVxYnAzU2VEdFd4cVwvaFQ0enJBPT0iLCJ2YWx1ZSI6IlhBT28wVUsxMktCdzJFcXM3eUpLczc5bklsYTh0V3p4MkVXUU1KdUJudzI3K1RhbEhXU0p0MVl0SE0rblBTa3VHTmQyTjJhaTdQemg0WStRbFRxblZYMFFcL1lQSmxCU2FoZHA4RjVVaWxrND0iLCJtYWMiOiJhZDFjZjE2MjFlZTgzYTUwNzZmOTA5MDM0ODJmZDc2NzA3ZTUxY2Y3MjM3YWJkYmI2ODQ4MTQ4ZmRhYjY2ZTZmIn0=",
    "user": {
      "age": 0,
      "ali_user_id": null,
      "birthday": 0,
      "e_name": "",
      "e_password": "",
      "head_img": "",
      "id": 96,
      "machine_code": "",
      "name": "",
      "nick_name": null,
      "password": "8274ea2a73777c09813f55035a59e221",
      "phone": "13800138003",
      "role": 1,
      "sex": 0,
      "status_code": 1,
      "time": 1516003227
    }
  },
  "error": ""
}
```
</details>

### `GET /api/forgotSendCode 找回密码发送验证码`
<details>
<summary>Request</summary>

```
GET /api/forgotSendCode?phone=13800138003 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Server: txthinking.com
Strict-Transport-Security: max-age=31536000;
X-Content-Type-Options: nosniff
X-Xss-Protection: 1; mode=block
Cache-Control: no-cache, private
Content-Type: application/json
Set-Cookie: app_session=eyJpdiI6ImNnYjlqS1JSZ0tBcVdaTEJUajB1MEE9PSIsInZhbHVlIjoiVzk0STBpQm9YZFlsN3dDd21CN29BNnh4b2t1OUVlT2U2YUoyaTdJRVUzaktQbGZIdWwzKzRjOGIxMGNPekN4SjQ0Nlo5Zng2SjdhXC9xcnppcG5cLzFcL1E9PSIsIm1hYyI6ImZmMDk4Zjk3ZjI0ZTU1Zjg1NzBkNWI3NjA0YWY2ZTg5NmYyY2VlM2NlZTIxOGNmMTU5OTVmYTk3OTYwNThlYTIifQ%3D%3D; expires=Mon, 15-Jan-2018 10:00:28 GMT; Max-Age=7200; path=/; HttpOnly
Vary: Accept-Encoding
X-Frame-Options: DENY
Date: Mon, 15 Jan 2018 08:00:28 GMT

{
  "code": 0,
  "data": {
    "token": "eyJpdiI6IllETmE2cTZRSmZkVVpkQnBnbmI2M3c9PSIsInZhbHVlIjoiWExMR1hQWE5QQlwva1A1Vzc2ekxCTkJuWWl1WDFuSitqMGloYlBPTUxLOXhJVG9MUituNkdRUERWeUJrRkhBbG5aU0pWUld6eVltTXJ2dlJMTWZhZ0VDR0J5emZ3RHp4NVZBd2FGcHhWcFJHVWdvaUc4QmpLSEJKamJzaG1qQXg0V2VKTUlSY05kQTVcL1hpRGVcL2M4N3hIblF4Q0szd09MZ0J0M0tGVERDZmNDU0xnNFRua2N6RVBydHVyU2lLS0xQIiwibWFjIjoiMDM3MDU1NTg3MjI1ODYzYWVjMjZiNDhlMjRkMTk3M2MyZjAyZTY0NDBmODVkZGEyMTIwZWNkN2VmYzVmNDllOSJ9"
  },
  "error": ""
}
```
</details>

### `GET /api/resetPwd 找回密码发送验证码`
<details>
<summary>Request</summary>

```
GET /api/resetPwd?code=111111&password=111111&phone=13800138003&token=eyJpdiI6IllETmE2cTZRSmZkVVpkQnBnbmI2M3c9PSIsInZhbHVlIjoiWExMR1hQWE5QQlwva1A1Vzc2ekxCTkJuWWl1WDFuSitqMGloYlBPTUxLOXhJVG9MUituNkdRUERWeUJrRkhBbG5aU0pWUld6eVltTXJ2dlJMTWZhZ0VDR0J5emZ3RHp4NVZBd2FGcHhWcFJHVWdvaUc4QmpLSEJKamJzaG1qQXg0V2VKTUlSY05kQTVcL1hpRGVcL2M4N3hIblF4Q0szd09MZ0J0M0tGVERDZmNDU0xnNFRua2N6RVBydHVyU2lLS0xQIiwibWFjIjoiMDM3MDU1NTg3MjI1ODYzYWVjMjZiNDhlMjRkMTk3M2MyZjAyZTY0NDBmODVkZGEyMTIwZWNkN2VmYzVmNDllOSJ9 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Cache-Control: no-cache, private
Content-Type: application/json
Strict-Transport-Security: max-age=31536000;
X-Content-Type-Options: nosniff
Date: Mon, 15 Jan 2018 08:00:29 GMT
Server: txthinking.com
Set-Cookie: app_session=eyJpdiI6InB4VFdmYmVIdkVjUmR6MTd5c3RMMEE9PSIsInZhbHVlIjoiNTE2RWdtYWdLc2UrbGRxekV3YVhwVEZSSG9jNldISzZnTnh1ZGJ3ZkVcL0ljMk80bTFEdWYrbExReTJvUXBJMFBtNlU2T3ZUQmwzcnBBVDZxVUJOZVp3PT0iLCJtYWMiOiIwMzA0OWQzNTc1ODk5MjIzYWUwYWNmNTI1YTE3ZDM0NTBjYWIzN2QyNGM4YTJhNDkzMzM0YTZkZjU5ZTk5OTQ3In0%3D; expires=Mon, 15-Jan-2018 10:00:29 GMT; Max-Age=7200; path=/; HttpOnly
Vary: Accept-Encoding
X-Frame-Options: DENY
X-Xss-Protection: 1; mode=block

{
  "code": 0,
  "data": null,
  "error": ""
}
```
</details>

### `GET /api/login 登录, 此步会返回认证cookie, 认证token(前端可忽略)*/`
<details>
<summary>Request</summary>

```
GET /api/login?password=111111&phone=13800138003 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Content-Type: application/json
Date: Mon, 15 Jan 2018 08:00:29 GMT
Set-Cookie: u=eyJpdiI6InlMQ1AxNFwvZnZyTW9ueitnQXhIUkxRPT0iLCJ2YWx1ZSI6Iit2QmN4UENCdjFJZlZIUVJoXC9uU3diaXVMRVpOWkY1KzlPYko0MDNLbDJDYzBYZWI3TG14NWRDTm96dE1YQm1FMEU3alpFZ2pFQlFIeU1FdFlnWFVHZmhpOUlEQjd2RVozNkh0aG1yT2JPY1N6OFAxOXdvXC9ERE96dUlSZ3orQlFCbmh6b251azR4cWVHeGk4TzVLbms1RGxUYk9qZUJPXC8wOW4rTTJQXC9mZFwvVGtNZTE3UDl3REJFNVZaemU0YXBZcW1ZVDJSWHZ5UDRxeDJhb2VISlBtbk4raWFmekV5V3dBZEhha1RjSEZSSGswM012Wk5GY1dGNVZSOXdnRjM1XC9FTytTcExMM2RnRmZvN3I5azVacXhTWmVtTmpWVzhsQU5JSHpGaklhTWMyZkxGOG9tbnNTeUdJYk5XYWFnZVhNOHJDNThNUVhVSVlzSnAreUtSY3d3QmdCZ0M0UUJ1TmZTT016WlNoYzJvZTlBYVFEQ1J5NitMcUhabTNcL1JpaGRiaCtBSU53cFh3SEhTVXFxdjd5YUJXVHp6UmRjcmc4N09BR3lKSEJvaGNFPSIsIm1hYyI6ImRkZmE5MmQ0ZTg2ZDY3NjFmZGEzNTZlNmFhYjgyNWZmZWNhNzJhMzRkNjIxODYzODYxYmE2N2YyOGRhZDI1NGEifQ%3D%3D; expires=Wed, 14-Feb-2018 08:00:29 GMT; Max-Age=2592000; path=/; HttpOnly
Strict-Transport-Security: max-age=31536000;
X-Content-Type-Options: nosniff
X-Frame-Options: DENY
Cache-Control: no-cache, private
Server: txthinking.com
Vary: Accept-Encoding
X-Xss-Protection: 1; mode=block

{
  "code": 0,
  "data": {
    "authtoken": "eyJpdiI6IlBlODRGY3BrakRKQkJieTJYd1ZjSWc9PSIsInZhbHVlIjoiSytBS0FHTG13NlNYV1ZQSnM3ZEpWVmQ1bkdtcERudm9ab1p1bndzQWZQR2NlOXdiUnlNc24zK0prV0U4VHdUTHlWWlVPMmd1NllPbWZ1b1VpR3haNEVJejBcL3B0Y0NOSE0wNitWelArZlZzPSIsIm1hYyI6ImU4YzQ0ZWNhNzUwNTRjMzFkZDM5N2ZkOWJhYThkY2Y4MjU4YjhhMDZlMDlmNWVhYjUyZTFlYjA0OTNkMTcwYzYifQ==",
    "user": {
      "age": 0,
      "ali_user_id": null,
      "birthday": 0,
      "e_name": "",
      "e_password": "",
      "head_img": "",
      "id": 96,
      "machine_code": "",
      "name": "",
      "nick_name": null,
      "password": "8274ea2a73777c09813f55035a59e221",
      "phone": "13800138003",
      "role": 1,
      "sex": 0,
      "status_code": 1,
      "time": 1516003227
    }
  },
  "error": ""
}
```
</details>

### `GET /api/updateUser 更新个人昵称和性别(1 男 2 女)`
<details>
<summary>Request</summary>

```
GET /api/updateUser?authtoken=eyJpdiI6IlBlODRGY3BrakRKQkJieTJYd1ZjSWc9PSIsInZhbHVlIjoiSytBS0FHTG13NlNYV1ZQSnM3ZEpWVmQ1bkdtcERudm9ab1p1bndzQWZQR2NlOXdiUnlNc24zK0prV0U4VHdUTHlWWlVPMmd1NllPbWZ1b1VpR3haNEVJejBcL3B0Y0NOSE0wNitWelArZlZzPSIsIm1hYyI6ImU4YzQ0ZWNhNzUwNTRjMzFkZDM5N2ZkOWJhYThkY2Y4MjU4YjhhMDZlMDlmNWVhYjUyZTFlYjA0OTNkMTcwYzYifQ%3D%3D&nick_name=3800138003&sex=1 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
X-Frame-Options: DENY
X-Xss-Protection: 1; mode=block
Cache-Control: no-cache, private
Content-Type: application/json
Date: Mon, 15 Jan 2018 08:00:30 GMT
Server: txthinking.com
Strict-Transport-Security: max-age=31536000;
Vary: Accept-Encoding
Set-Cookie: app_session=eyJpdiI6IkU2Z2JIa3FMVVhPK1pUbnBjUlpCakE9PSIsInZhbHVlIjoiUE5PbjVBbThKdDBjeW1ENjROa0gyU3JyTFlhNXB1UFZxNmNyYlBoYXdTRTdHYThcL2xubHd0amdjK28wRjdJR0EwalpWb2U2ekcwRGhoRThUcFZKUFd3PT0iLCJtYWMiOiI4ODQxNWUzYjE0YmYyNDMyYjJlMjU5ZmE0MzZlMWVlOGY3NmM0MTU1MTI1MjEwYWQ2NmE0ODI1YTQyNmY4NWZkIn0%3D; expires=Mon, 15-Jan-2018 10:00:30 GMT; Max-Age=7200; path=/; HttpOnly
X-Content-Type-Options: nosniff

{
  "code": 0,
  "data": null,
  "error": ""
}
```
</details>

### `GET /api/updatePwd 更新密码`
<details>
<summary>Request</summary>

```
GET /api/updatePwd?authtoken=eyJpdiI6IlBlODRGY3BrakRKQkJieTJYd1ZjSWc9PSIsInZhbHVlIjoiSytBS0FHTG13NlNYV1ZQSnM3ZEpWVmQ1bkdtcERudm9ab1p1bndzQWZQR2NlOXdiUnlNc24zK0prV0U4VHdUTHlWWlVPMmd1NllPbWZ1b1VpR3haNEVJejBcL3B0Y0NOSE0wNitWelArZlZzPSIsIm1hYyI6ImU4YzQ0ZWNhNzUwNTRjMzFkZDM5N2ZkOWJhYThkY2Y4MjU4YjhhMDZlMDlmNWVhYjUyZTFlYjA0OTNkMTcwYzYifQ%3D%3D&password=111111&phone=13800138003 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Content-Type: application/json
Date: Mon, 15 Jan 2018 08:00:30 GMT
Set-Cookie: app_session=eyJpdiI6ImFsZmtram1UOE5kUFhhaVJqVUFDVEE9PSIsInZhbHVlIjoiWjB1Tkk4bFdPTGNEWXp2TEM0ZElSRmlyYjFDQ1l0M3VScTJwYk5DcHNFZjJKNm5VWEx3bytjQmJzZlRNWnR4cjZGQUdsNithOWNEejJtMFdjeGlJdVE9PSIsIm1hYyI6Ijg3ZmRjZWI1NmI2Y2VhMzRiODc0YzdjNGM1ZTQ5ZjZkNGM1ZWEzZjlkNjU0MzQ3NjhiMjAxMzVlMTc0YzIwNWYifQ%3D%3D; expires=Mon, 15-Jan-2018 10:00:30 GMT; Max-Age=7200; path=/; HttpOnly
Strict-Transport-Security: max-age=31536000;
X-Content-Type-Options: nosniff
X-Frame-Options: DENY
Cache-Control: no-cache, private
X-Xss-Protection: 1; mode=block
Vary: Accept-Encoding
Server: txthinking.com

{
  "code": 0,
  "data": null,
  "error": ""
}
```
</details>

### `GET /api/showPartyKol 显示kol的在某活动的商品`
<details>
<summary>Request</summary>

```
GET /api/showPartyKol?authtoken=eyJpdiI6IlBlODRGY3BrakRKQkJieTJYd1ZjSWc9PSIsInZhbHVlIjoiSytBS0FHTG13NlNYV1ZQSnM3ZEpWVmQ1bkdtcERudm9ab1p1bndzQWZQR2NlOXdiUnlNc24zK0prV0U4VHdUTHlWWlVPMmd1NllPbWZ1b1VpR3haNEVJejBcL3B0Y0NOSE0wNitWelArZlZzPSIsIm1hYyI6ImU4YzQ0ZWNhNzUwNTRjMzFkZDM5N2ZkOWJhYThkY2Y4MjU4YjhhMDZlMDlmNWVhYjUyZTFlYjA0OTNkMTcwYzYifQ%3D%3D&kol_id=3&party_id=1 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Set-Cookie: app_session=eyJpdiI6IitCR1k1SlVcL3VGekhtUlRtdkxRVGZnPT0iLCJ2YWx1ZSI6InJvdmNKWFUyUUZiclFBbFp5ZnY5UUp5UzJWT2xzWU9tMTdBQlpoWEk4UlNyeUJwZk5WaStFbXJ2S2QyQzJVVkZvVndQdEZZYkpkUnZDcWVwYjAzYVd3PT0iLCJtYWMiOiI1YTY3ZWUxMzFlMThiYjcxOGI1ZmZmMTAzOGI3NzU4ZDkyZGEzNGM2OTMwM2UyNGExYmNhZDgxY2MwNzUxMDBiIn0%3D; expires=Mon, 15-Jan-2018 10:00:33 GMT; Max-Age=7200; path=/; HttpOnly
X-Content-Type-Options: nosniff
Content-Type: application/json
Date: Mon, 15 Jan 2018 08:00:33 GMT
Server: txthinking.com
Strict-Transport-Security: max-age=31536000;
Vary: Accept-Encoding
X-Frame-Options: DENY
X-Xss-Protection: 1; mode=block
Cache-Control: no-cache, private

{
  "code": 0,
  "data": {
    "jieji": [
      {
        "alias_name": "",
        "assist_pic": "5,6",
        "assist_pic_objs": [
          {
            "id": 5,
            "path": "/public/uploads/party/20170913/5d9d8a23498ad3ba432f0a12594df919.jpg",
            "status_code": 1,
            "time": 1515051284
          }
        ],
        "begin_time": 1515052649,
        "block_number": 1,
        "end_time": 1515052649,
        "hotel_img": 0,
        "hotel_introduce": "",
        "hotel_name": "",
        "id": 3,
        "id_information_type": 3,
        "is_subscriber_data": 1,
        "kol_id": 3,
        "party_id": 1,
        "price": 500,
        "quantity": 1,
        "remarks": "接机",
        "restrictions_number": 0,
        "serve_type": {
          "alias_english": "meet",
          "alias_name": "接机",
          "id": 4,
          "sequence": 2,
          "serve_name": "经济型",
          "status_code": 1,
          "time": 1515050967,
          "type": 2
        },
        "shelves_status": 1,
        "ticket_serve_id": 4,
        "time": 1515051284,
        "type": 2
      },
      {
        "alias_name": "",
        "assist_pic": "4",
        "assist_pic_objs": [
          {
            "id": 4,
            "path": "/public/uploads/party/20170913/a4f883249d99b3cde1ef79f657a80c86.jpg",
            "status_code": 1,
            "time": 1515051284
          }
        ],
        "begin_time": 1515052649,
        "block_number": 1,
        "end_time": 1515121594,
        "hotel_img": 0,
        "hotel_introduce": "",
        "hotel_name": "",
        "id": 7,
        "id_information_type": 3,
        "is_subscriber_data": 1,
        "kol_id": 3,
        "party_id": 1,
        "price": 500,
        "quantity": 1,
        "remarks": "接机",
        "restrictions_number": 0,
        "serve_type": {
          "alias_english": "meet",
          "alias_name": "接机",
          "id": 5,
          "sequence": 2,
          "serve_name": "商务型",
          "status_code": 1,
          "time": 1515050967,
          "type": 2
        },
        "shelves_status": 1,
        "ticket_serve_id": 5,
        "time": 1515050967,
        "type": 2
      }
    ],
    "jiudian": [
      {
        "alias_name": "",
        "assist_pic": "1",
        "assist_pic_objs": [
          {
            "id": 1,
            "path": "/public/uploads/subscriber/20170904/eda8659a2d5721d3d141d2dada8177ec.jpeg",
            "status_code": 1,
            "time": 1515050843
          }
        ],
        "begin_time": 1515052649,
        "block_number": 1,
        "end_time": 1515052649,
        "hotel_img": 1,
        "hotel_img_obj": {
          "id": 1,
          "path": "/public/uploads/subscriber/20170904/eda8659a2d5721d3d141d2dada8177ec.jpeg",
          "status_code": 1,
          "time": 1515050843
        },
        "hotel_introduce": "希尔顿国际酒店集团(HI)，为总部设于英国的希尔顿集团公司旗下分支，拥有除美国外全球范围内“希尔顿”商标的使用权。希尔顿国际酒店集团经营管理着403间酒店，包括261间希尔顿酒店，142间面向中端市场的“斯堪的克”酒店，以及与总部设在北美的希尔顿酒店管理公司合资经营的、分布在12个国家中的18间“康拉德”（亦称“港丽”）酒店。它与希尔顿酒店管理公司组合的全球营销联盟，令世界范围内双方旗下酒店总数超过了2700间，其中500多间酒店共同使用希尔顿的品牌。希尔顿国际酒店集团在全球80个国家内有着逾71000名雇员",
        "hotel_name": "希尔顿饭店",
        "id": 2,
        "id_information_type": 2,
        "is_subscriber_data": 1,
        "kol_id": 3,
        "party_id": 1,
        "price": 3777,
        "quantity": 88,
        "remarks": "酒店",
        "restrictions_number": 9,
        "serve_type": {
          "alias_english": "wineshop",
          "alias_name": "酒店",
          "id": 2,
          "sequence": 1,
          "serve_name": "大床房",
          "status_code": 1,
          "time": 1515050843,
          "type": 1
        },
        "shelves_status": 1,
        "ticket_serve_id": 2,
        "time": 1515051284,
        "type": 2
      },
      {
        "alias_name": "",
        "assist_pic": "2",
        "assist_pic_objs": [
          {
            "id": 2,
            "path": "/public/uploads/subscriber/20170904/eda8659a2d5721d3d141d2dada8177ec.jpeg",
            "status_code": 1,
            "time": 1515051330
          }
        ],
        "begin_time": 1515052649,
        "block_number": 1,
        "end_time": 1515121594,
        "hotel_img": 1,
        "hotel_img_obj": {
          "id": 1,
          "path": "/public/uploads/subscriber/20170904/eda8659a2d5721d3d141d2dada8177ec.jpeg",
          "status_code": 1,
          "time": 1515050843
        },
        "hotel_introduce": "希尔顿国际酒店集团(HI)，为总部设于英国的希尔顿集团公司旗下分支，拥有除美国外全球范围内“希尔顿”商标的使用权。希尔顿国际酒店集团经营管理着403间酒店，包括261间希尔顿酒店，142间面向中端市场的“斯堪的克”酒店，以及与总部设在北美的希尔顿酒店管理公司合资经营的、分布在12个国家中的18间“康拉德”（亦称“港丽”）酒店。它与希尔顿酒店管理公司组合的全球营销联盟，令世界范围内双方旗下酒店总数超过了2700间，其中500多间酒店共同使用希尔顿的品牌。希尔顿国际酒店集团在全球80个国家内有着逾71000名雇员",
        "hotel_name": "希尔顿饭店",
        "id": 5,
        "id_information_type": 1,
        "is_subscriber_data": 1,
        "kol_id": 3,
        "party_id": 1,
        "price": 3000,
        "quantity": 100,
        "remarks": "酒店",
        "restrictions_number": 2,
        "serve_type": {
          "alias_english": "wineshop",
          "alias_name": "酒店",
          "id": 1,
          "sequence": 1,
          "serve_name": "双人标间",
          "status_code": 1,
          "time": 1515050843,
          "type": 1
        },
        "shelves_status": 1,
        "ticket_serve_id": 1,
        "time": 1515051330,
        "type": 2
      }
    ],
    "kol": {
      "age": 0,
      "ali_user_id": null,
      "birthday": 1503991932,
      "e_name": "wonderland_13011957687",
      "e_password": "",
      "head_img": "public/uploads/subscriber/20170904/eda8659a2d5721d3d141d2dada8177ec.jpeg",
      "id": 3,
      "machine_code": "0F74509C-1113-4B23-B0E8-2BA6C829158",
      "name": "",
      "nick_name": "测试昵称",
      "password": "",
      "phone": "",
      "role": 2,
      "sex": 1,
      "status_code": 1,
      "time": 0
    },
    "party": {
      "begin_time": 1517414400,
      "brief_introduction": "英语由古代从丹麦等斯堪的纳维亚半岛以及德国、荷兰及周边移民至不列颠群岛的盎格鲁、撒克逊和朱特部落的白人所说的语言演变而来，并通过英国的殖民活动传播到了世界各地。由于在历史上曾和多种民族语言接触，它的词汇从一元变为多元，语法从“多屈折”变为“少屈折”，语音也发生了规律性的变化。在19至20世纪，英国以及美国在文化、经济、军事、政治和科学在世界上的领先地位使得英语成为一种国际语言。如今，许多国际场合都使用英语做为沟通媒介。",
      "city_id": 106,
      "dj_id": "2",
      "effective_days": 3,
      "end_time": 1517673600,
      "figure": "/StaticResource/BusinessPicture/slkdjflksdjflk.png",
      "id": 1,
      "m_style_id": "1,2",
      "name": "吉姆餐厅",
      "party_time": 1517414400,
      "place": "国贸13号楼",
      "privacy": 1,
      "sponsor_id": "1",
      "status_code": 1,
      "time": 1503162761,
      "vendibility": "1,2,3,4,5,6",
      "venue_id": 1
    },
    "songji": [
      {
        "alias_name": "",
        "assist_pic": "3",
        "assist_pic_objs": [
          {
            "id": 3,
            "path": "/public/uploads/party/20170913/762bc9fb332d9725db8b76eb70ad6973.png",
            "status_code": 1,
            "time": 1515050843
          }
        ],
        "begin_time": 1515052649,
        "block_number": 1,
        "end_time": 1515121594,
        "hotel_img": 0,
        "hotel_introduce": "",
        "hotel_name": "",
        "id": 6,
        "id_information_type": 3,
        "is_subscriber_data": 1,
        "kol_id": 3,
        "party_id": 1,
        "price": 400,
        "quantity": 1,
        "remarks": "送机",
        "restrictions_number": 2,
        "serve_type": {
          "alias_english": "give",
          "alias_name": "送机",
          "id": 7,
          "sequence": 3,
          "serve_name": "经济型",
          "status_code": 1,
          "time": 1515051284,
          "type": 3
        },
        "shelves_status": 1,
        "ticket_serve_id": 7,
        "time": 1515050843,
        "type": 2
      }
    ],
    "ticket": [
      {
        "alias_name": "",
        "assist_pic": "",
        "begin_time": 1515052649,
        "block_number": 1,
        "end_time": 1515052649,
        "hotel_img": 0,
        "hotel_introduce": "",
        "hotel_name": "",
        "id": 1,
        "id_information_type": 0,
        "is_subscriber_data": 0,
        "kol_id": 3,
        "party_id": 1,
        "price": 200,
        "quantity": 58,
        "remarks": "票",
        "restrictions_number": 2,
        "shelves_status": 1,
        "ticket_serve_id": 1,
        "ticket_type": {
          "id": 1,
          "status_code": 1,
          "ticket_class": 1,
          "ticket_name": "早鸟单日票",
          "time": 1511267430,
          "type": 1
        },
        "time": 1515050843,
        "type": 1
      },
      {
        "alias_name": "",
        "assist_pic": "",
        "begin_time": 1515052649,
        "block_number": 1,
        "end_time": 1515121594,
        "hotel_img": 0,
        "hotel_introduce": "",
        "hotel_name": "",
        "id": 4,
        "id_information_type": 0,
        "is_subscriber_data": 0,
        "kol_id": 3,
        "party_id": 1,
        "price": 25000,
        "quantity": 100,
        "remarks": "票",
        "restrictions_number": 2,
        "shelves_status": 1,
        "ticket_serve_id": 4,
        "ticket_type": {
          "id": 4,
          "status_code": 1,
          "ticket_class": 1,
          "ticket_name": "普通通票",
          "time": 1507884505,
          "type": 2
        },
        "time": 1515121594,
        "type": 1
      }
    ],
    "yongche": []
  },
  "error": ""
}
```
</details>

### `GET /api/createOrder 创建订单`
<details>
<summary>Request</summary>

```
GET /api/createOrder?authtoken=eyJpdiI6IlBlODRGY3BrakRKQkJieTJYd1ZjSWc9PSIsInZhbHVlIjoiSytBS0FHTG13NlNYV1ZQSnM3ZEpWVmQ1bkdtcERudm9ab1p1bndzQWZQR2NlOXdiUnlNc24zK0prV0U4VHdUTHlWWlVPMmd1NllPbWZ1b1VpR3haNEVJejBcL3B0Y0NOSE0wNitWelArZlZzPSIsIm1hYyI6ImU4YzQ0ZWNhNzUwNTRjMzFkZDM5N2ZkOWJhYThkY2Y4MjU4YjhhMDZlMDlmNWVhYjUyZTFlYjA0OTNkMTcwYzYifQ%3D%3D&data=%7B%22jieji%22%3A%5B%7B%22flight_number%22%3A%22%E6%97%A0%22%2C%22goods_id%22%3A3%2C%22quantity%22%3A1%2C%22surname_and_name%22%3A%22Sunwukong%22%2C%22time%22%3A1515998889%7D%5D%2C%22jiudian%22%3A%5B%7B%22birthday%22%3A662688000%2C%22contact_phone%22%3A%2213800138000%22%2C%22contacts%22%3A%22Sunwukong%22%2C%22goods_id%22%3A2%2C%22identification%22%3A%22123456789012345678%22%2C%22name%22%3A%22Wukong%22%2C%22passport_number%22%3A%22%22%2C%22quantity%22%3A1%2C%22remarks%22%3A%22%E5%A4%87%E6%B3%A8%22%2C%22surname%22%3A%22Sun%22%7D%5D%2C%22songji%22%3A%5B%7B%22flight_number%22%3A%22F123467%22%2C%22goods_id%22%3A6%2C%22quantity%22%3A1%2C%22surname_and_name%22%3A%22Sunwukong%22%2C%22time%22%3A1515998889%7D%5D%2C%22ticket%22%3A%5B%7B%22goods_id%22%3A1%2C%22quantity%22%3A1%7D%5D%2C%22yongche%22%3A%5B%5D%7D&kol_id=3&party_id=1&remarks=%E8%BF%99%E6%98%AF%E6%88%91%E7%9A%84%E8%AE%A2%E5%8D%95%E5%A4%87%E6%B3%A8 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Cache-Control: no-cache, private
X-Content-Type-Options: nosniff
X-Frame-Options: DENY
Set-Cookie: app_session=eyJpdiI6Iml0ZERSOGs0Zlc5bE9yeVY2cnc5S2c9PSIsInZhbHVlIjoiV1Y1Q2NrTWZNUWVwdGRHcTNzVDMrUkxLMUk2RStIVnE5K2JXQjhFV2NVZElwNlNRZ1RwSDR3NVJiRzNTb21BdmxXMTVSVXhRbmdqT0d1U21zUWtSUlE9PSIsIm1hYyI6IjQwNjA0ZmI3MDEyNmYxNzI0Yzk5ZWQ1NDc5YTIyYzdkZWQxZmM4ZWJiMGM0YTg0OWFiOThjYzViNzA5MjdhMGYifQ%3D%3D; expires=Mon, 15-Jan-2018 10:00:36 GMT; Max-Age=7200; path=/; HttpOnly
Strict-Transport-Security: max-age=31536000;
Vary: Accept-Encoding
X-Xss-Protection: 1; mode=block
Content-Type: application/json
Date: Mon, 15 Jan 2018 08:00:36 GMT
Server: txthinking.com

{
  "code": 0,
  "data": {
    "contact_phone": "13800138000",
    "contacts": "Sunwukong",
    "goods_snapshot": "",
    "id": 34,
    "kol_id": 3,
    "order_no": "5a5c5fa1be1a5",
    "party_id": 1,
    "pay_money": 4877,
    "pay_time": 0,
    "pay_way": 0,
    "remarks": "这是我的订单备注",
    "subscriber_id": 96,
    "ticket_status": 0
  },
  "error": ""
}
```
</details>

### `GET /api/getOrder 显示订单详情`
<details>
<summary>Request</summary>

```
GET /api/getOrder?authtoken=eyJpdiI6IlBlODRGY3BrakRKQkJieTJYd1ZjSWc9PSIsInZhbHVlIjoiSytBS0FHTG13NlNYV1ZQSnM3ZEpWVmQ1bkdtcERudm9ab1p1bndzQWZQR2NlOXdiUnlNc24zK0prV0U4VHdUTHlWWlVPMmd1NllPbWZ1b1VpR3haNEVJejBcL3B0Y0NOSE0wNitWelArZlZzPSIsIm1hYyI6ImU4YzQ0ZWNhNzUwNTRjMzFkZDM5N2ZkOWJhYThkY2Y4MjU4YjhhMDZlMDlmNWVhYjUyZTFlYjA0OTNkMTcwYzYifQ%3D%3D&order_id=32 HTTP/1.1
User-Agent: github.com/txthinking/frank

```
</details>
<details>
<summary>Response</summary>

```
HTTP/2.0 200 OK
Content-Type: application/json
Set-Cookie: app_session=eyJpdiI6Ilg0dGhRY2JlOTFNUEt2dG9TN0U1XC93PT0iLCJ2YWx1ZSI6IkhIV3lMSUJmTlFIdTNJbmtKcGkwSElFTWhmdE1cL3V6WkJiWW55ejNQYXZWcDhyVUgxa29NaVFRVDFCM1wvU0ZRdlZHU1ZyTFl5elwvcFFSazZ0M3N2cGpnPT0iLCJtYWMiOiJiOWM0ZDY5MTRlNDNjOGZhZTViODAzZjc0MTBmMzNkNTQ3YWZjZDE5N2Q2Nzk1M2I4OGFhMWIyNGEwOWQ5MThlIn0%3D; expires=Mon, 15-Jan-2018 10:00:37 GMT; Max-Age=7200; path=/; HttpOnly
Vary: Accept-Encoding
Cache-Control: no-cache, private
Date: Mon, 15 Jan 2018 08:00:37 GMT
Server: txthinking.com
Strict-Transport-Security: max-age=31536000;
X-Content-Type-Options: nosniff
X-Frame-Options: DENY
X-Xss-Protection: 1; mode=block

{
  "code": 0,
  "data": {
    "jieji": [
      {
        "create_time": 1516001478,
        "goods": {
          "alias_name": "",
          "assist_pic": "5,6",
          "begin_time": 1515052649,
          "block_number": 1,
          "end_time": 1515052649,
          "hotel_img": 0,
          "hotel_introduce": "",
          "hotel_name": "",
          "id": 3,
          "id_information_type": 3,
          "is_subscriber_data": 1,
          "kol_id": 3,
          "party_id": 1,
          "price": 500,
          "quantity": 1,
          "remarks": "接机",
          "restrictions_number": 0,
          "serve_type": {
            "alias_english": "meet",
            "alias_name": "接机",
            "id": 4,
            "sequence": 2,
            "serve_name": "经济型",
            "status_code": 1,
            "time": 1515050967,
            "type": 2
          },
          "shelves_status": 1,
          "ticket_serve_id": 4,
          "time": 1515051284,
          "type": 2
        },
        "goods_num": 1,
        "goods_price": 500,
        "goods_total": 500,
        "id": 141,
        "order_id": 32,
        "party_ticket_id": 3,
        "status": 0,
        "update_time": 1516001478,
        "use_time": 1515998889
      }
    ],
    "jiudian": [
      {
        "create_time": 1516001478,
        "goods": {
          "alias_name": "",
          "assist_pic": "1",
          "begin_time": 1515052649,
          "block_number": 1,
          "end_time": 1515052649,
          "hotel_img": 1,
          "hotel_introduce": "希尔顿国际酒店集团(HI)，为总部设于英国的希尔顿集团公司旗下分支，拥有除美国外全球范围内“希尔顿”商标的使用权。希尔顿国际酒店集团经营管理着403间酒店，包括261间希尔顿酒店，142间面向中端市场的“斯堪的克”酒店，以及与总部设在北美的希尔顿酒店管理公司合资经营的、分布在12个国家中的18间“康拉德”（亦称“港丽”）酒店。它与希尔顿酒店管理公司组合的全球营销联盟，令世界范围内双方旗下酒店总数超过了2700间，其中500多间酒店共同使用希尔顿的品牌。希尔顿国际酒店集团在全球80个国家内有着逾71000名雇员",
          "hotel_name": "希尔顿饭店",
          "id": 2,
          "id_information_type": 2,
          "is_subscriber_data": 1,
          "kol_id": 3,
          "party_id": 1,
          "price": 3777,
          "quantity": 87,
          "remarks": "酒店",
          "restrictions_number": 9,
          "serve_type": {
            "alias_english": "wineshop",
            "alias_name": "酒店",
            "id": 2,
            "sequence": 1,
            "serve_name": "大床房",
            "status_code": 1,
            "time": 1515050843,
            "type": 1
          },
          "shelves_status": 1,
          "ticket_serve_id": 2,
          "time": 1515051284,
          "type": 2
        },
        "goods_num": 1,
        "goods_price": 3777,
        "goods_total": 3777,
        "id": 140,
        "order_id": 32,
        "party_ticket_id": 2,
        "status": 0,
        "update_time": 1516001478,
        "use_time": 0
      }
    ],
    "kol": {
      "age": 0,
      "ali_user_id": null,
      "birthday": 1503991932,
      "e_name": "wonderland_13011957687",
      "e_password": "d41d8cd98f00b204e9800998ecf8427e",
      "head_img": "public/uploads/subscriber/20170904/eda8659a2d5721d3d141d2dada8177ec.jpeg",
      "id": 3,
      "machine_code": "0F74509C-1113-4B23-B0E8-2BA6C829158",
      "name": "",
      "nick_name": "测试昵称",
      "password": "c8e03ff2cd05f7ed21f2cd3d56f11b66",
      "phone": "13011957687",
      "role": 2,
      "sex": 1,
      "status_code": 1,
      "time": 0
    },
    "order": {
      "contact_phone": "13800138000",
      "contacts": "Sunwukong",
      "goods_snapshot": "",
      "id": 32,
      "kol_id": 3,
      "order_no": "5a5c58c557b56",
      "party_id": 1,
      "pay_money": 4877,
      "pay_time": 0,
      "pay_way": 0,
      "remarks": "这是我的订单备注",
      "subscriber_id": 91,
      "ticket_status": 0
    },
    "party": {
      "begin_time": 1517414400,
      "brief_introduction": "英语由古代从丹麦等斯堪的纳维亚半岛以及德国、荷兰及周边移民至不列颠群岛的盎格鲁、撒克逊和朱特部落的白人所说的语言演变而来，并通过英国的殖民活动传播到了世界各地。由于在历史上曾和多种民族语言接触，它的词汇从一元变为多元，语法从“多屈折”变为“少屈折”，语音也发生了规律性的变化。在19至20世纪，英国以及美国在文化、经济、军事、政治和科学在世界上的领先地位使得英语成为一种国际语言。如今，许多国际场合都使用英语做为沟通媒介。",
      "city_id": 106,
      "dj_id": "2",
      "effective_days": 3,
      "end_time": 1517673600,
      "figure": "/StaticResource/BusinessPicture/slkdjflksdjflk.png",
      "id": 1,
      "m_style_id": "1,2",
      "name": "吉姆餐厅",
      "party_time": 1517414400,
      "place": "国贸13号楼",
      "privacy": 1,
      "sponsor_id": "1",
      "status_code": 1,
      "time": 1503162761,
      "vendibility": "1,2,3,4,5,6",
      "venue_id": 1
    },
    "songji": [
      {
        "create_time": 1516001479,
        "goods": {
          "alias_name": "",
          "assist_pic": "3",
          "begin_time": 1515052649,
          "block_number": 1,
          "end_time": 1515121594,
          "hotel_img": 0,
          "hotel_introduce": "",
          "hotel_name": "",
          "id": 6,
          "id_information_type": 3,
          "is_subscriber_data": 1,
          "kol_id": 3,
          "party_id": 1,
          "price": 400,
          "quantity": 1,
          "remarks": "送机",
          "restrictions_number": 2,
          "serve_type": {
            "alias_english": "give",
            "alias_name": "送机",
            "id": 7,
            "sequence": 3,
            "serve_name": "经济型",
            "status_code": 1,
            "time": 1515051284,
            "type": 3
          },
          "shelves_status": 1,
          "ticket_serve_id": 7,
          "time": 1515050843,
          "type": 2
        },
        "goods_num": 1,
        "goods_price": 400,
        "goods_total": 400,
        "id": 142,
        "order_id": 32,
        "party_ticket_id": 6,
        "status": 0,
        "update_time": 1516001479,
        "use_time": 1515998889
      }
    ],
    "ticket": [
      {
        "create_time": 1516001478,
        "goods": {
          "alias_name": "",
          "assist_pic": "",
          "begin_time": 1515052649,
          "block_number": 1,
          "end_time": 1515052649,
          "hotel_img": 0,
          "hotel_introduce": "",
          "hotel_name": "",
          "id": 1,
          "id_information_type": 0,
          "is_subscriber_data": 0,
          "kol_id": 3,
          "party_id": 1,
          "price": 200,
          "quantity": 57,
          "remarks": "票",
          "restrictions_number": 2,
          "shelves_status": 1,
          "ticket_serve_id": 1,
          "ticket_type": {
            "id": 1,
            "status_code": 1,
            "ticket_class": 1,
            "ticket_name": "早鸟单日票",
            "time": 1511267430,
            "type": 1
          },
          "time": 1515050843,
          "type": 1
        },
        "goods_num": 1,
        "goods_price": 200,
        "goods_total": 200,
        "id": 139,
        "order_id": 32,
        "party_ticket_id": 1,
        "status": 0,
        "update_time": 1516001478,
        "use_time": 0
      }
    ],
    "yongche": []
  },
  "error": ""
}
```
</details>

<br/>

> Generated by [https://github.com/txthinking/frank](https://github.com/txthinking/frank)
