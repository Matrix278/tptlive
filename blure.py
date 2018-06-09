startArray=[[0,0,0,0,0,0],
            [0,0,255,255,0,0],
            [0,255,255,255,255,0],
            [0,255,255,255,255,0],
            [0,0,255,255,0,0],
            [0,0,0,0,0,0]]
def summator(x,y,d):
    global startArray
    S=0
    xS=x-d
    if xS<0:
        xS=0
    yS=y-d
    if yS<0:
        yS=0
    xE=x+d
    if xE>len(startArray)-1:
        xE=len(startArray)-1
    yE=y+d
    if yE>len(startArray[0])-1:
        yE=len(startArray[0])
    xC=xS
    while xC<=xE:
        yC=yS
        while yC<=yE:
            S+=startArray[xC][yC]
            yC+=1
        xC+=1
    '''S+=startArray[x-1][y-1]
    S+=startArray[x][y-1]
    S+=startArray[x+1][y-1]
    S+=startArray[x-1][y]
    S+=startArray[x][y]
    S+=startArray[x+1][y]
    S+=startArray[x-1][y+1]
    S+=startArray[x][y+1]
    S+=startArray[x+1][y+1]'''
    return S

print(summator(1,1,1))
