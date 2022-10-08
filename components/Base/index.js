import styled from "styled-components";
import antDButton from "antd/lib/button";
export const Button = styled(antDButton)`
  background: ${(props) => props.background || "#fff"};
  color: ${(props) => props.color || "#fff"};
  border: ${(props) => props.border || "2px solid #fff"};
  height: ${(props) => props.height || "2.5rem"};
  width: ${(props) => props.width || "10rem"};
  padding: ${(props) => props.padding || "10px"};
  display: flex;
  align-item: center;
  justify-content: center;
  font-weight: ${(props) => props.fontWeight || "bold"};
  gap: 1rem;
  font-size: ${(props) => props.fontSize || "1rem"};
  &:hover {
    background: ${(props) =>
      props.hoverBackground || "rgb(1,44,90)"} !important;
    color: ${(props) => props.hoverColor || "#fff"} !important;
    border: ${(props) => props.hoverBorder || "none"} !important;
  }
`;
export const Text = styled.span`
font-size:${(props) => props.fontSize || "14px"}};
color: ${(props) => props.color || "#000000"};
font-weight: ${(props) => props.fontWeight || "#000000"};
width: ${(props) => props.width || "100%"};
text-align: ${(props) => props.textAlign || "left"};
cursor: ${(props) => props.cursor || ""};

@media (max-width: 1000px) {
 text-align:center;
 width: ${(props) => props.mobileWidth || "100%"};
 font-size:${(props) => props.mobileFontSize || "1rem"}};
}
`;
export const Flex = styled.div`
  display: flex;
  text-align: ${(props) => props.align || "left"};
  flex-direction: ${(props) => props.direction || "row"};
  align-items: ${(props) => props.alignItems || "center"};
  justify-content: ${(props) => props.justifyContent || "start"};
  gap: ${(props) => props.gap || "10px"};
  flex-wrap: ${(props) => props.wrap || ""};
  width: ${(props) => props.width || "100%"};
  margin: ${(props) => props.margin || "0px"};
  height: ${(props) => props.height || ""};
  padding: ${(props) => props.padding || "0px"};
  color: ${(props) => props.color || "#fff"};
  background: ${(props) => props.background || "transparent"};
  font-size: ${(props) => props.fontSize || "0.8rem"};
  font-weight: ${(props) => props.fontWeight || "400"};
  @media (max-width: 768px) {
    flex-direction: ${(props) => props.directionMobile || "column"};
    align-items: ${(props) => props.alignItemsMobile || "center"};
    justify-content: ${(props) => props.justifyContentMobile || "center"};
    gap: ${(props) => props.gapMobile || "10px"};
    width: ${(props) => props.widthMobile || "100%"};
    height: ${(props) => props.heightMobile || ""};
    padding: ${(props) => props.paddingMobile || "0px"};
    font-size: ${(props) => props.fontSizeMobile || "0.8rem"};
  }
`;
