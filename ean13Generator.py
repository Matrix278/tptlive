import random
def eanGenerator():
    regCode=({'code':380, 'country':'Bulgaria'}),({'code':520, 'country':'Greece'}),
    '''print(regCode[1]['country'])'''
    prodicerNum=random.randint(1, 9999)
    '''if prodicerNum>999:
        prodicerCode=str(prodicerNum)
    if prodicerNum<1000 and prodicerNum>99:
        prodicerCode='0'+str(prodicerNum)
    if prodicerNum<100 and prodicerNum>9:
        prodicerCode='00'+str(prodicerNum)
    if prodicerNum<10 and prodicerNum>0:
        prodicerCode='000'+str(prodicerNum)
    print(prodicerCode)'''
    prodicerCode="%04d"%prodicerNum
    productNum=random.randint(1, 99999)
    productCode="%05d"%productNum
    eanProto=str(regCode[random.randint(0,len(regCode)-1)]['code'])+str(prodicerCode)+str(productCode)
    print(eanProto)
    '''sum1=int(eanProto[1])+int(eanProto[3])+int(eanProto[5])+int(eanProto[7])+int(eanProto[9])+int(eanProto[11])'''
    sum2=0
    i=0
    for d in eanProto:
        if i==1: # if i%2!==1;
            sum2+=int(d)
            i=1-i # i+=1;
    rez2=sum2*3
    sum1=0
    i=0
    for d in eanProto:
        if i!=1: # if i%2==1
            sum1+=int(d)
        i=i-1 # i+=1
    sum3=sum1+rez2
    rez=10-int(str(sum3)[len(str(sum3))-1])
    rezEan=str(eanProto)+str(rez)
    return rezEan
print(eanGenerator())
