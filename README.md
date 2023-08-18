# YouthLearn
青年大学习最后完成图，青年大学习打卡,本程序仅供学习！
## 青年大学习，解析青年大学习的完成图(最后一页的结尾图)

- 1、将代码文件下载到你的服务器或主机中，尽量使用有公网ip或一些可以被解析的主机，因为微信无法访问内网的ip(192.168.1.x之类的)，网站通过ua识别拦截非微信访问的请求，必须使用微信访问

- 2、给这些代码文件创建一个网站，使用宝塔什么的都可以，主要目的是为了能访问到页面，如下图，不要着急，你已经成功一半了，现在还不能正常使用，跟着教程继续下去

- [![pPemuQK.jpg](https://s1.ax1x.com/2023/08/09/pPemuQK.jpg)](https://imgse.com/i/pPemuQK)

- 3、我们需要对该网站进行一个初始化，在初始化之前，我们还需要将settings.php的权限更改为777,因为我们使用setup.php初始化时，安装程序会自动对settings.php进行修改，因此需要让settings.php具有被修改的权限，否则配置保存不成功，当然也可以补救，就是手动修改settings.php文件

  ```
  chmod 777 settings.php
  ```

  [![pPeeD8x.jpg](https://s1.ax1x.com/2023/08/09/pPeeD8x.jpg)](https://imgse.com/i/pPeeD8x)

- 4、使用数据库是用来保存用户的解析记录，我们需要对setup.php进行访问，在浏览器中输入,xxx.xx代表你的当前部署的网站域名(ip也可以)，数据库使用mysql

- ```
  http://xxx.xx/setup.php?user=数据库用户名&pwd=数据库密码
  
  例如：网站名为  test.lizhanqi.cn   数据库用户名root 密码123
  你需要访问http://test.lizhanqi.cn/setup.php?user=root&pwd=123
  ```

  [![pPeuXIH.md.png](https://s1.ax1x.com/2023/08/09/pPeuXIH.md.png)](https://imgse.com/i/pPeuXIH)

- 执行成功后会得到下图的提示

  [![pPenUhR.jpg](https://s1.ax1x.com/2023/08/09/pPenUhR.jpg)](https://imgse.com/i/pPenUhR)

- 如果得到是下图那么你需要手动修改settings.php的内容了[![pPencAH.md.jpg](https://s1.ax1x.com/2023/08/09/pPencAH.md.jpg)](https://imgse.com/i/pPencAH)

- 5、现在你的青年大学习解析已经可以正常使用了

- 6、进去大学习的视频页复制链接

  [![pPeuGxP.md.jpg](https://s1.ax1x.com/2023/08/09/pPeuGxP.md.jpg)](https://imgse.com/i/pPeuGxP)

- 7、通过微信打开你的网站,输入刚才复制的内容，点击Get

  [![pPemuQK.jpg](https://s1.ax1x.com/2023/08/09/pPemuQK.jpg)](https://imgse.com/i/pPemuQK)

- 8、然后你就得到了，大学习的最后的完整的截图了，现在你可以截取当前页面，愉快的交给团支书了，注意在你复制大学习视频的那一刻，大学习的后台就已经记录你的学习记录，因此可以直接截取到记录图，无需担心

  [![pPemMLD.jpg](https://s1.ax1x.com/2023/08/09/pPemMLD.jpg)](https://imgse.com/i/pPemMLD)

- 9、setup.php会创建一个qn_learn的数据库,数据库里面会创建一个qn_learn_list的数据表，表中包含的数据如下，记录的都是成功解析到最后一页的记录，记录包含 访问者的ip，和解析的青年大学习的链接和大学习链接的标题，还有解析的时间，还有解析者的设备ua，通过ua可以简单判别对方使用的设备，本网站也是采用ua识别拦截非微信访问的

  [![pPeer26.png](https://s1.ax1x.com/2023/08/09/pPeer26.png)](https://imgse.com/i/pPeer26)


> 注意事项：配置完毕建议删除setup.php
