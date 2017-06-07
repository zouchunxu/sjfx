<?php
/**
1）merchant_private_key，商户私钥;merchant_public_key,商户公钥；商户需要按照《密钥对获取工具说明》操作并获取商户私钥，商户公钥。
2）demo提供的merchant_private_key、merchant_public_key是测试商户号1111110166的商户私钥和商户公钥，请商家自行获取并且替换；
3）使用商户私钥加密时需要调用到openssl_sign函数,需要在php_ini文件里打开php_openssl插件
4）php的商户私钥在格式上要求换行，如下所示；
*/
		$merchant_private_key='-----BEGIN PRIVATE KEY-----
MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBALfw7byIWgkST3u5
i+RsGIZTdxwGWPA0rDXBA8nkwDzCK74U+xxgHPAvY4eK7L0+BQydM+xLL/ohcZTV
r2JtLOKnvVzBxX90xX/sNIdk9KEKZVoyLW5oNKNiu4VXkjgL3K2DsaZ1yQjVwmr9
sddgNDpzy7b6ZpK/iCc1gwCNLgf1AgMBAAECgYAfcuTiuBlUtbm7OKUPX9/tj3Ws
5/Tq1Magxihkq2SmvrgF3sZ0OoaYFjIZKYqCbIkmd/Y5rz07sd4eiU5cMLhcmeGX
1fOXHIPgOQ+EtMAxbH2x2mhw+51OsLBx1UU80S/3Ziqgwup3iMhubAmGAiEIyVjD
amhUoTmGX7jblQGNYQJBAOcdZBermGKch4dzXGw9vZ8aM0iXfXVDoG2ohS3cOWNM
pPHLzi50StUuR7YRDjyRzmPDcKhbYTarzUfdSTu7ga0CQQDLvzWnQihRxCcYG+X9
j219i6n1zVYLoeK4aZn5ndIY4hYXntC6ClHFRM78mZZ+1qb0DhsooMWGQK5u+oRZ
iDhpAkA7Smn8PJRqb/fBAxJp3mkAISuY6uxPohrNJxeLjVzXobkLIxrxBfqQuD/D
cJqzZUCKjYAgYNkOuoJ+dkGsZk09AkB36N6Aw1TLWm/PpouiwMilfI7YVLJxQiMW
eT/fQlylvFlYKWWaN/yL5sUSsKl7mITFWY/uR0A4lNSUB+fgcWURAkBUxq61V5RX
UTCYYsU9VI9rmrdHvanF1xBP7Or5o8fXIRpFF4dWHxKnHur22de4UyQLNTNiMNyp
wixULRP9ALeA
-----END PRIVATE KEY-----';

	//merchant_public_key,商户公钥，按照说明文档上传此密钥到多的宝商家后台，位置为"支付设置"->"公钥管理"->"设置商户公钥"，代码中不使用到此变量
	//demo提供的merchant_public_key已经上传到测试商家号后台
	$merchant_public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC38O28iFoJEk97uYvkbBiGU3cc
BljwNKw1wQPJ5MA8wiu+FPscYBzwL2OHiuy9PgUMnTPsSy/6IXGU1a9ibSzip71c
wcV/dMV/7DSHZPShCmVaMi1uaDSjYruFV5I4C9ytg7GmdckI1cJq/bHXYDQ6c8u2
+maSv4gnNYMAjS4H9QIDAQAB
-----END PUBLIC KEY-----';
	
/**
1)ddbill_public_key，多的宝公钥，每个商家对应一个固定的多的宝公钥（不是使用工具生成的密钥merchant_public_key，不要混淆），
即为多的宝商家后台"公钥管理"->"多的宝公钥"里的绿色字符串内容,复制出来之后调成4行（换行位置任意，前面三行对齐），
并加上注释"-----BEGIN PUBLIC KEY-----"和"-----END PUBLIC KEY-----"
2)demo提供的ddbill_public_key是测试商户号1111110166的智付公钥，请自行复制对应商户号的智付公钥进行调整和替换。
3）使用多的宝公钥验证时需要调用openssl_verify函数进行验证,需要在php_ini文件里打开php_openssl插件
*/
	$ddbill_public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCJQIEXUkjG2RoyCnfucMX1at7O
PtOCDSiKZhtzHw5HOjXKteBpYBqEBOZc9pNjP/fKbvBNZ3Z7XxUn5ECfQbPCtH9y
++c0WxAYPoZiPDEYeQmRJfqPR68c0aAtZN5Kh7H1SI2ZRvoMUdZGvvFy3vuPnTwm
3R+aHq17bch/0ZAudwIDAQAB 
-----END PUBLIC KEY-----';





	



?>