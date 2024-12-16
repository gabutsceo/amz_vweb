<?php

header("Access-Control-Allow-Origin: *");  // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  // Allowed methods
header("Access-Control-Allow-Headers: Content-Type");  // Allowed headers

// Fungsi untuk memeriksa email Amazon
function checkAmazonEmail($email) {
    $url = "https://www.amazon.com/ap/signin";

    // Cookies
    $cookies = [
        "csm-sid=224-2006018-8926971",
        "x-amz-captcha-1=1734359502802177",
        "x-amz-captcha-2=GZbQdXkhA5K0DtrIp8ZO3Q==",
        "session-id=138-0267182-9790249",
        "i18n-prefs=USD",
        "sp-cdn=\"L5Z9:ID\"",
        "skin=noskin",
        "ubid-main=135-4905766-7071531",
        "session-token=3OOeAGaxhkS0mMXQJ68d6G++U8zHw2NS+FP5n+Z9F7cgLqGS812BPucGmJj42SSpLRF6BppSg2NmWrulzzNdihCVBC18hzRi4fc0Px+cSAZy2P/w40YPRCb7vHPKkAtM2JgiN1HyUSCOQpozXgoy/pYCjvYWtoLCI83iavWtkLH8QxRwbYWf47YUoVk1Wt0NCKGFINwqR9DnoMWRHoy1fq2mqA/GkFtOlbXWCEIX4cSsjm0obqSlbNUcZXsmJAbDKaeldHNGnshm6LIf7PgaVrSBENQ+siJss55/rA7X/B6tx9ARworrEO+HsQU3Mu2yQOIxEp2ZnF2H9fisMXX6rIXIKSHHjTf4",
        "id_pkel=n1",
        "id_pk=eyJuIjoiMSJ9",
        "JSESSIONID=EE2C43E8A2FF8582AA455012443CE111",
        "session-id-time=2082787201l",
        "csm-hit=tb:PDY2EFB9PQ3AQB3YMB19+s-ZFRJB88VCPARR0XR5ZB6|1734352239801&t:1734352239801&adb:adblk_no"
    ];

    // Headers
    $headers = [
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
        "Accept-Encoding: gzip, deflate, br, zstd",
        "Accept-Language: en-US,en;q=0.9",
        "Cache-Control: max-age=0",
        "Content-Type: application/x-www-form-urlencoded",
        "Cookie: " . implode("; ", $cookies),
        "Origin: https://www.amazon.com",
        "Referer: https://www.amazon.com/ap/signin?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.com%2F%3Fref_%3Dnav_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=usflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0",
        "Sec-CH-UA: \"Google Chrome\";v=\"131\", \"Chromium\";v=\"131\", \"Not_A Brand\";v=\"24\"",
        "Sec-CH-UA-Mobile: ?0",
        "Sec-CH-UA-Platform: \"Windows\"",
        "Sec-Fetch-Dest: document",
        "Sec-Fetch-Mode: navigate",
        "Sec-Fetch-Site: same-origin",
        "Sec-Fetch-User: ?1",
        "Upgrade-Insecure-Requests: 1",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36",
        "Viewport-Width: 1056"
    ];
    // Data
    $data = http_build_query([
        "appActionToken" => "gf0ty1flDjRsy2oWhanMZ21e4f8j3D",
        "appAction" => "SIGNIN_PWD_COLLECT",
        "subPageType" => "SignInClaimCollect",
        "openid.return_to" => "ape:aHR0cHM6Ly93d3cuYW1hem9uLmNvbS8/cmVmXz1uYXZfc2lnbmlu",
        "prevRID" => "ape:WkZSSkI4OFZDUEFSUjBYUjVaQjY=",
        "workflowState" => "eyJ6aXAiOiJERUYiLCJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiQTI1NktXIn0.jBI_J6hOfUT9bsEDlB7-QcElPqArHyehvSCdpyQcWFlnBRZfttpTUA.EFH0WDMtwPoh6LJA.-xmom3HI_aRi1fqmk0YgQpJ2sHr-0RJeh1uwC2IQoQO-AcdAfhviGX60zNCFagbMbbF3z8hcNK2_c_0Eu9hQ8E2P-AxtAb8ABB2Mk7tCf2XIEqPHgfSapfuKX-9azEZI_5bgNPfsPdvTk5WbAJrnD1R3FMT7HIjrBtnyDZp0g_hg7fbPZnO79FCpST5-29m4vXWeEts_R_vKcDTZ_A0fRs9N3LSEugYEPx-W_llSvOuCdUBzJuuWRHNdKu-hioRRuff2KtEbsFyqSTBllxlMEMePEHdzZeigGubmw7SL5IC6HdpRjw.OXqr7BhNCI9T-Cl-IEhQEQ",
        "email" => $email,
        "password" => "",
        "create" => "0",
        "metadata1" => "ECdITeCs:pP2AmmSyQPhc0Wmm+NBiLqFAIbhIllS/i9azcGZjYdmhpOAfdbrw9rMH9o1Ig2ZkPbifzrBTjf7QWofz+Vtw99F5Qtiq7hVezlnFA/odRdi1fjVrkmui6JQUUwIRdQ5QjkhKC3o+modZiAc6U0DfYYy1xh6D1HG3Yh6OR2kNMruTFwCQ6ZVGODTeStFVT6DJ2+q2we1RUoMo6ripRyv38ZucQXVMT3pbZwKiTeWcgOkr3Y5BwA6dScwuZ4CL5YREWz2oSeNLWwck//qPt2rwZSR6IXzerQ0HudugwYpKxyFZf172uLm4WSWLYPZaMeEVyabeAeIHiUVnUulS9zOzXWM5Q4xC7rNONlIemy1h8t56vRpMPa8Wwqb/T/9pwrfexjqyWxIGtHwqlx57IiE8phhPdUpGYV7Au/yPRjvUF2gCRPprMUFn+oLcosXeqf4xZRmH+zIbuBi2Oe/F2Qcvw5EURzQQlySl9+4Xzd2ECQmvh+/6dDsBPUm185mKnZ9eLLEufRXlBHgAQJegfVW822J5nhfQ0XW11aWnzZNBqj3YH5/Vm+5ZiJkFSC/KK0oDD8apG2ftqsoUsXxFvy7WuYH1OYMKYAQNvU1/gKLZsq7E31WSs8Z/Db9fGcqzHJzyuA0aIQO2xtNkBXdxjXjX9lDmnufBN/Zf41mPKJjks7RhBdxQbN9V0gK980LmCwpNoHONf0Bl6dQZlwDkCYjxqJvD9z7BhIC3W8uqYuHZEoX3bv4V9aIRCDaKliVs/bI7v15M3eq/v5nElSLe8ymB2fhP/4Go0gqP+pg4yJFJDRkea/3uM2ptGUcZzJXMcKo8Tod34m/ugC2Q0Mh3ZkvyZL24qRhjnTmpcBLzwlbNRnZtNxYGKv0lDu5t3KsrIAYnaEsvrzMInr5uru1oP1qE5G9/1VGhjzrfiHEt+fOzlPeMUmIy/5Fo+M5waV2R5tFYcnT7p+wucyvUSWgdhzyzHA8+SCOs/oSTsCkrrO1JJN0eMdSkfInohlCpZUiBZe/ytzkQvlqISrM4HRGTtrg3rf+37VUl46ECmp3v2PFbrc+dnJ548RS+0/8bpyvWO7GqkB+RbateFpSdE5rsOEWiQh3b8MI6CkApnAOXJY2dvwXmBKk8Ovy/VNj5d5zrItaSqPajS0tpF1pFE8Gz3GjAnoOGZUTUytGhugOHdxuGZPGc4Tx9nlhBX2NCT4HfNzbsOShjIaGKSGcAIKhqb+XmlU199zslAddRSr1afHw0UOEtPcL24BK4NauvXT1FY2SrSx+FT3c6kkUue1+YaIqdB9LX+kKTV11FhYStnPXhLBa5PMEZafPeuFBZlyL6Fu4Xy0iBUPYtv1nRwE7xZclkC8JGlJ9Lgyhez26T5gA+ZzmP6fgb2G9bU+cHU0bIahsAgqROJ1JZxwOfPwxvlE7CnsAnoSgGjhqmWXBGp7Dk5t7Zzm7GpeXGAuF+0EtwdjwqWN2mByLqYVHx+D4KrUXkJLHa/a/YnPALsjOPKJsXrVSZXHDO8jiXXsBnbPmztWZYVuh1NJCmrG+eX86C27e23d8IO9xDqaCUGFak0ouHRS/xl7knOHf54tAC1RlTJvyTk6APhr4vedGWCJiiVvjlB4pqE9DPAdQJfJ+1uEXremqmJ25c1nEeH/4ChNf2LvQxmcvqMTFeea2wAgVtcT5ASvKf3fBe7LCIBH2U8CFFsx9FvNAmfx+zd5wpy/BpbdhqyDm1jd5jAba2SPhMmMJFdvuLuN+w/87dxxc7WGAFdORM9THRZCv37y+gNBNzgedyR32WKkdUzgH1J6vxaLnQgGhFYn/cdMq4PIxHHUjytliTrFqvhVWkGUvHIxByMaOoBxVTXRcYJ3BGfFMsmsbTqcZh6ouip+5FaQBPz92pCSuhQMIVU/dM1E7keEE8crZXoUzTEBX4147Z1OQ5/LRSTr4ZFqETCUDJmi8J5kMlClmLVpqFvHGh7N3D5511XTEi+0lezVj15beoHX1T5u96H5tgWEekizziOVg0x0UubcKxLLZmgid1QPTNy7/Tr5xff3fxD5l9W4CTis/6DzFtXZhiyXWQg/lZGaGy5+DVOEKlnNvDWA7mpFf8tVf3XNW6WPaC062+MShE/EYtO13bUspZWQbvEWtXEVTCU6k3T5q1BcQkABaMGFGAM5HVXDY0EOdRBr1pSOI26W0AjkLM+XOtsmW1yB2cq5Ef94k9fLfzSXJz/9nR4d/zbZzC75uFn09PwzYKUJM4LxJP1brMaz2RIdgFWyHq/FIM9Xq2n7qazPQhk5aY240285bIDRjOzLCRuCC5vkdn+Ut+AEhjbs6epYoysvVxEl+BJQX8hFuEnwuYtE9GF0sRPNpCIWS+PPJ4uMeJneq2PMvrfrwQFPLKBezz74gRECI16y6VI5NYTQC3/XtNLNtyYyiV/FhcS8MM6AJxPDqZ4XmWiXGvRYYEKCCpXaWaYVZlWU6RFif+B0Rw4dUv1cpH+hUcmp84s8slZgR/wJdc5osr/QjSuxDrwcU+qaZu8OuIMpyLLPtLcRq9uEB9W9wUrGT+gvQhxVoDYtlWWASSBq1Eai44zLrbhkFgsUyUUMZZAgUMYgeiAj+lhWy8TkPYYw1JgkLTbaYwQtR7iB+3rCFkSNLOWRM611A8RbwcDcQ8qk73ltWted8bCmYqokJDIOJZeH6dSL/DMNuzjc6fbDLgevQxkBvB6NkuAiJndqjI9iuJa/SRpU90gOyonRosTDIEZENPxwRScSFaIqgqCIu092MopfgaxCtvQjUA70NxDie2VHzlLObEDJ275CxqNN+fmIfKk6WZYBnEbhzCplVfvisxcVpV5EoMQk5R3zeOM9jc9nGE2DIyrztp4KX80W9QuQ10nVF+7Bf/dT8XFNivpK1uG+FcLeqQUV6qaBgtMeTI16iAB9pimrODjpzftdeWvcRbjZGc3LQ5RCOq7ULEKaUP4yiINWc849b4EUAsxWBlqwqMYQIOA823gaLT0pYZbEmh3JpvY0OEX0NDe+dqAkcoOvVmzzTP/lunCy2qS03QuHF1qEeRV3dKZ//TqUlX+fGctZ8cdUWqgfNSEpXqoKXZinb08T3RYD6rjxdDqZCGUTsSgeAUdT/UdYXYmb9ytTmGxwiHkhsg6aSDB/UWygYeoTbT3FdYS2M17U+vuAx4KF2CoE1S1lGbC0dJqbRGxBqUQ5b7IpDXTUUwwuUJcE/ZHFaNuZDTZPu/qLaoCUgSVr78k6IBKN2v/awclxejHfkCSYEcBdNWcO7DrvMstDJdZEh520xhRQLi4foSiKO5h4nYy2JLNFWfX5oAL/833AW5Q5G9goXw+jsynDSmJHnfiOuGecWFmQADYZH/bgUd+JvsT/Yu9l+Tvwaix4gUx0bhZf+uHNcIqE0xkMMaPu2bXfedeiiMqD3wiNExkIDSwKfrQ5qoBzkuMWs8w4HqTrvPzUjVPL0knAK7qde7fSasRdxwmlsICIqn3ZhM+IuesvzOBrS9g/wCr5Mb9JDCKSpf3mk9LzvnhqDwtrX1fovNkFsE3s9zw53JrUa9SdYKdB6wXtI+9i/Wtr3uSAnTxjCmkmU67Zd2gIx2qgcG9+OUpkqrjWbxv5fMFKpAEm0gWn9A6oGd68bHAu5Dnt5KbsADg8g6cGqv77M4WJSaG9TIqadcc0SvFVWQzGP8rftC5bDUeB+bw+W+1RymswJCjGjxPrsqmdkdBBCz7GcBJ2k3aqGN2sJV5XPFQ3bG7SWyHq0BXDXNZUf+YMi4wf3dKE7pn7RZr5Uk0GY/GJXbJ1ByKqzrLB1fs4OkPaf4Dgf1Jx3YaIAOh0XOLUmtXhdJuEpCNhO2AAuW/OeHiVbjge588NpJuuvxGWvyelutW06ZRFTyUlXJmME+TrPLyQeEvr0DJPW4jFGrXLnJ8PjQLNZHolAexbUVhTlGizWpfYpMQDZCjt/ui8gXhELJfRkTHbY/JrxubSn292RAlo7FQ7C7apqbKbbE1N0y1JTwUQDAH8WDWE5oa/LS/btSLbo1KJPEpn/+Vi/HkdLmO7AKAnn1CG2bCNZ/+DU9geXqG4cDw+cfmtZ4W1OX9CqtbUCBF1876foHtGFuuryJw56KQWqDCHHDAcRgSKOJS6RV0YI2dJCIfTzu/Jh+wXttbMFQ8zuA9rzwZUDH4ynV7QBIDw5QW1ZSoTY2Ak9lJHMmVk0+lyCFaWTVN/MV+PkKHbm0Ew/b5Srez75ZAjCB2lIQOgq8E6nR2WvCadBJG4odsiaNDnRmB3pW61YNOSri4YfGtiTAB5mo6OQDONHKQzBVFsoAvz1iWHJkAejwbFvrw+Ok4XLDAYrevIA3ZdZw+2pyJM1Pi68j1Cj+Ol2T20YFLqywgOz/I1Tgs4LRMr2lo2cVPrJ+2x+igrDjYOPB/y4EyxkXqZxyG1LjzwuW3ya5PfazNzv5cREyte9VHHFtXUK7edLGzHvq9y4+Lz7EA4kTTq8bZwMYn35Ol1iblh5f18eeuBXDk0pJV5jc5tyEyob+wZMug2TS7tkJEBbhrWDM9Yj2if5vn4Y5pmXHJx1y15K66FdtGPQaqEu27vyIFL+sHdHmObPj5kzPbTqgpf5n95hqXRbW3GYkxDm1Hcopdy7FmNfqKfk0kKoD/LZKYyk9vUBm+HWbOMqCXQ37MZe+su/ovDkP0Bancigmot3SXA1x8shw7ONxMzNvV+GVsjcqy0f4eosawQGmdaDXtui7fJ81+dd19Mc5tKf92pydVFgW3JiMR8oC7I1pZ83Kn+/yXoVlXj36qCQqhxxgEvOuKAVFxwTkOENO/tFysmNA5qDbiA+R0xaU2WIMaY1eV1o+Mp1Ue+kctJrDYvj5O5cGlrf+k44toURCavtPhBdN4S/J7hniQc3augG816NxF1NymZCpHWswF3CsGq04q8alw791+JNgnsOqo+jra66w89QIcYm51V+B5pNnn9Sl6eMHhnr7msWeT22hTQ47/cqcUR4jfomc47exgcQaz5BGNTZBwiWx/fuori/OdJGiBbc8p0lWzyf7JODtbh8nqT8WTB501JYpR4CJRR7eI3NZk+g7ldM7xfQao6Aq33zl0JG0mrLKCgxfSX03Cww+1cKsqpGmK0ZERS+I1oGQY3ijHmzUf1JIHvmNuUo+3bauxa00psR7s8PLlsKVkhfZE3BMAwlDrgC/S6TSOZ+ilr6PYHMDqRC8WxY/IUC7s6+zwOK8Zz7zp2Z6NMW8NqsfTIl8xfig0LdboPlSjPzijcUi0XuMfQx05+os0HCEnFUwtjsMkT89RiJ6c2g/MGtblIpeP0zgQY1pIdu2oUMxsX6EmfzowgU8doIDIcgUb97GNRo4X532gh8RcBhdc7yFhvIOXhMV+dQTlan+oZRRLac6yGvAtIdbxwcEMagDU7V8ryETBO1zVl+yjtMW8HOMUz32liwVV+opt7ya8URvjzqRu6kW2lZGmWGAX76iFFT4+9BSoTfLaFvCN7ktgLhFNEW3M2xdIBpHM15gcFdQ2q6m6EnTXj/Fb3tqt8xV8x3Fv60cP8BWYoeR4Ay6Cdgu9AUj176JZjRbltWEpXsgsSSg2VBrmF3WYKy7/hzVVQIlYNNDvO1x4e2sKkbu6yQoqcQKBTCqvj9lr4DVtblpjVVpdR3agsoM3AwvEbeThR44lTWDWq1fLOObpOzVXYFNbuT9IP5AahyYgqumN33qCdiIkUubL6GcBASHUn0QDg7VuEkm2OACOpaIzTRSG2bWPprsh0sBaOvOwnDq7kWn1k1jx++0cknwwouhpZSWzLnUI1wFV91idHAy869avOcdne9ggLllxGzwuWqhNa36Uu5RFaiSebVZujCn81GBtQK/ZHXPlKTjY6T9mmhzQhsO7AKczBmTV2eOBtBDkg0iBhhcLURQFsCGn95lPQ0ZFKZ5NrJc3jSYjAA5G/tvPGBcuuBKM6z9IJ91M/O8EZfCXXf0h7jTaxwX9Fnf3NC7ATOXnfuaX8R4LgKrU4CjvHTs/+qu14Swt/kF91hTGGoXD7mxspovShfrc69c2wvUhsxM/pKjR+vl+xZCGsVt3Q9pIsQl7tH5lagwYSgz+BOT5DVM1VMDL+tR9mQ7yRgcgruIAIJb0ydnZZetvWBBKmrpxD6kcwXz/L9WnNhNtkLf7sHtrzbqEka5Mnauik4paxv2E5dNTZtoXEwYJYpGzr8tExiN6SsTM2THD5mM0GwGIAqbb910rXhjj2cHncf+vIPZC/nREjGwmrJtDhUrDb2H3QDsVA5zNAhmzzZHpmKuDbXM6mb2Sj+mWs1sEqDlnMi64oBavfSDprPGXFsamNGvj9gXNjpd4ltpczpU9skAgnHJtgB0ZaqJUKcRAAr+CaWmNcqitDj8JQ4eNoOWIqQlp1l7oP8WoG/Yi7LMuw04Ke5WRUAcgl11TmeR3CGtRZ1bB8r2eX6XUT7vs9kdjVHLyiZPM3/c498HtDrMFHUasY1lP6enNqMRa615VhdBPZOr9UKoUR1/7u6JWJGGp3PY6B1z9Iwarn9raQg9XfpMgHEbLIY0tTf7FTa7kPdH0ji9OFc6CoxjCHgzAb16g+3NztRWhuvZ6s84f/jnWn1egxg8KF9kmymMI5wQEDdaf4ImzAzAxTvA8NfPoHETXkOWnOuy2AL6GcK0xO/lW11YywNxjrC85d3Il5qk8nQmtA408V6pdmp/ynNju+NT1Nxni+kJzBXZU0eRpEBT50RmBbn6ySicOZwbku7rSE0/gLkWDtQOZrD1ZOQ7pbQc7wdABtsU6EsLQbZkmfxyYY2MZ0mgf18jWAzgYlJwmCzk/MokrNwhsmb83xzsAwLAPvroWqDfw/MlXuDWcF/sgiJ1h5D1ZtuV1jlV/VIhETj5rfdGg0v8VHEnufvS4Ou3wFDFSroqZFmKPyvkmfPcVevovSig11K3ge3F/i7elA6s6NdQ8113XhVcZmeyGxPdnQ9E/x5qcI8HweKdVZinSrXFS6SO4XYEts//0s6wrLR8yBGvBG/iKntyEiZZZ/LT+p6xkIbdfMK1QDfUTEDuacIDjCRLwdeIgOVsNIeQnBo8IViRlFOcEICaUFwI5dT4WC5B5CBFJBRpuvMKJ+r2WPYmpBxak9sktRoGSDKSoLMGuc853aFMocDtE/P9RbYL7C+6cLClQsb8bg7MGq/DQGLbVTBH0483B/u+zzC3TNN4+RNNxRybGbgZ+W8opLHG2JFEgqpRN9YEuJB2Co98uJuIgPPBmwQXZE89QdAC0J/IB5u7Z/aum6vvJ9tSEKHnlIqAbL9E4F3wP0hxmhV0NBLUzulEipuRj0EFlOGbQKqerdPex2VoHS4alN+sUXFYd2HjDLpcyGRv9uCiliVcMeWn41PahOwHexXeVR5owfX5A9yTY52SrC39qpRmH5FJ2oB5N8iW3eEzJbi5xbeNPWxUzcLyGQW/usKARflrEHDZAoqT1+kk6Ngo/x6sT2zkrMDB/sQwZyglbbtigwFSEGDKLY9C7QKiwUCc1Riv+p2KRoBU27C+1ibWmop1ZE1EMu8oM0MYC8p+B51V9GIfcELE6sYMuDHzFpXvAk0KJkoqAeCaJDLxD4/MHt+lXFjTyMT16xPOfKBNkrtL2vr4C9WJ6c62/Gg8heLUoOle+6Ix/6oDwIZ2GcaWzwkkJ40isVcz+2sO1mksZ2K3BKqaW0bmVieLLmzNneBOuNiekCoTRqrJHL4IUTk4nptmdxdlSYo0/aWOVr0nCAgx3JZM7kNucbsf82XKgW/9tw+oewvvAUkc0QDlTwWWd2dixLaqIgkGdDJNerz+QR35Zt4ChEVEyTP5IWQZzaT/KT9m82icPmoCleI0PwYFm1pXF24LCwqwm6bUWwCyfcQVbJ6zGJ4QTQ1sbBmZZ+fCB75DTWbJ9luaDbiy5QPEH1A0T5O+XW3sViuE0/OcNXtH33V97hBO1ZQzRCLkfQrGxto4XhgNLqZML+ytm38Yu7UfaclDVgW8NFeyfgXuB5cr/5EMklYacgDD0TpDAruOitPhDe2e1U55N9Eg2WZ7yW7yYMeeh0wZ8s83VKPPn+rpoKCvZvP6Drf9+1wpujaJDpk+76oTwT7kMbCc9XU6V88+ASCtGewLHrFI4/oSRDSDDMQFgKZLX1xhzS3uzdby9lFK9CJgfqcYHEtsxk2/zhNDyT4wqK67KhU8k/sszocitQtmTwymVbtys/YSqGPwz8h+aohxVoUJSjAzhmNlFcFhRUr4vJ/hsu+bg1wUOCi5H0djC7oErXMG+GHHq0VyFW/tY+42F5Lnyyw5IENcgXAZ0pLIPXG7Yg5GtT7oYQisR4yNS0h1/CqTTstsDuhrQmQetGvlDa8w6/m5EkHRNw7hbvaSLABP7cVY7Z7DTHB8zIAiD5EJrdJA3eS0jSaa+6+KXPfAyb6CqdQZomjQVsmWfEI6F0LpfphtGFjgTS6T+EJ5n2M7obncNUjGFFdvXl2mlDMrt9EBGszaziwHh8g4cgjkCrQfLglHW473gwvHxFmpomCtcD03iyexCD0Y9QyDxEvaa1MKBlxTrE82lucQQvl4he95QLDMBV/mqBHcGfjL6gtD0A55AypS9nVsBX8eYWxddUTgcnxgad9gmAQijQNB9DDRyIom+nDGSx1G/BqzP61snW6YqFKCktNmRLROQac7ixEMoiVAwTef1OW6mMjOGT4PWTe5XUsAZUPPMZ2MShCriQaFVoyKY8WppTQj5SGXXPSvsBta6s/oG3R5dJw5emovqH0MkYtqLWy+CeEx+iT4Zi4+LtT+K5kETchUn2h8gWb1tMG29beVKJiULW4eryh1aGjHjONd8gncF54TvbrgD3sOQcPJeJfTh9OqRhF+gSBRbnp2oaTlmNtzKWAdEl5zLuZlfKzoFoqaciZJYsDzJrH+yyzkEKP7vgjphrRXB4/Z3XxPXqzuaCKn0LYEGeZ7ig8OgsnX2Fk8EX4/n497S2CZP9DrMsxYPSX3/NpsWDPURaFV72mLjSCSydarREYamENOUH2tIuKKpZfNywYjejPzZavCpG1hEWPri5lqLB9bcKVb1ly01mQeP1ATel45f1zeCtRRNaYHGDJGE7IDc25uZti4V+XmCjWXUxz+tvNvAaG17gs1StrDKIXXKs/UU5hY3Z4PxTdV5oKF7eJjN/+72ZyMBKmp0fcI+jgWUEUysxSYDEJHHCwlWqLLyTYwegyMsFYZ106oJPKoGFc="
		"aaToken" => json_encode(["uniqueValidationId" => "45dbe598-c5bb-4659-bf6f-ed0a3a141fb0"]) // Adds aaToken with the uniqueValidationId
	]);

    // CURL Request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_COOKIE, implode("; ", $cookies));
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Tentukan hasil pengecekan berdasarkan kondisi
    if (strpos($response, "ap_change_login_claim") !== false) {
        return "Valid";
    } elseif (strpos($response, "We cannot find an account with that email address") !== false) {
        return "Invalid";
    } elseif ($http_code != 200) {
        return "Unknown (HTTP Error $http_code)";
    } else {
        return "Invalid";
    }
}

// Mengambil email dari URL query parameter
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    // Panggil fungsi untuk mengecek email
    $result = checkAmazonEmail($email);
    echo $result;
} else {
    echo "Mo apa bosku";
}
?>
