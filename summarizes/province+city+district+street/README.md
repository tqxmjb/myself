1、	获得省份数据。
json/province.json
[
  {
    "citycode": "010",
    "adcode": "110000",
    "name": "北京市",
    "level": "province",
    "center_N": 39.904989,
    "center_J": 116.405285,
    "center_lng": 116.405285,
    "center_lat": 39.904989
  },
  {
    "citycode": "022",
    "adcode": "120000",
    "name": "天津市",
    "level": "province",
    "center_N": 39.125596,
    "center_J": 117.190182,
    "center_lng": 117.190182,
    "center_lat": 39.125596
  },
  {
    "citycode": [],
    "adcode": "130000",
    "name": "河北省",
    "level": "province",
    "center_N": 38.045474,
    "center_J": 114.502461,
    "center_lng": 114.502461,
    "center_lat": 38.045474
  }
]

2、	根据省份数据中adcode里前两个字符获取城市数据。
例如：获取河北省的城市。/json/city/13.json
[
  {
    "citycode": "0311",
    "adcode": "130100",
    "name": "石家庄市",
    "level": "city",
    "center_N": 38.045474,
    "center_J": 114.502461,
    "center_lng": 114.502461,
    "center_lat": 38.045474
  },
  {
    "citycode": "0315",
    "adcode": "130200",
    "name": "唐山市",
    "level": "city",
    "center_N": 39.635113,
    "center_J": 118.175393,
    "center_lng": 118.175393,
    "center_lat": 39.635113
  },
  {
    "citycode": "0335",
    "adcode": "130300",
    "name": "秦皇岛市",
    "level": "city",
    "center_N": 39.942531,
    "center_J": 119.586579,
    "center_lng": 119.586579,
    "center_lat": 39.942531
  },
  {
    "citycode": "0310",
    "adcode": "130400",
    "name": "邯郸市",
    "level": "city",
    "center_N": 36.612273,
    "center_J": 114.490686,
    "center_lng": 114.490686,
    "center_lat": 36.612273
  }
]

3、	根据城市数据中citycode的值获得地区数据。
例如：获得石家庄的地区。/json/district/0311.json
[
  {
    "citycode": "0311",
    "adcode": "130102",
    "name": "长安区",
    "level": "district",
    "center_N": 38.047501,
    "center_J": 114.548151,
    "center_lng": 114.548151,
    "center_lat": 38.047501
  },
  {
    "citycode": "0311",
    "adcode": "130104",
    "name": "桥西区",
    "level": "district",
    "center_N": 38.028383,
    "center_J": 114.462931,
    "center_lng": 114.462931,
    "center_lat": 38.028383
  },
  {
    "citycode": "0311",
    "adcode": "130105",
    "name": "新华区",
    "level": "district",
    "center_N": 38.067142,
    "center_J": 114.465974,
    "center_lng": 114.465974,
    "center_lat": 38.067142
  }
]

4、	根据地区数据中adcode的值获取街道数据。
例如：获取长安区的街道。/json/street/130102.json
[
  {
    "citycode": "0311",
    "adcode": "130102",
    "name": "南村镇",
    "level": "street",
    "center_N": 0,
    "center_J": 0,
    "center_lng": 114.645657,
    "center_lat": 38.062428
  },
  {
    "citycode": "0311",
    "adcode": "130102",
    "name": "胜北街道",
    "level": "street",
    "center_N": 0,
    "center_J": 0,
    "center_lng": 114.508524,
    "center_lat": 38.07218
  }
]
